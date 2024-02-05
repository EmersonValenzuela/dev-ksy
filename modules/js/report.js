$(($) => {
	sessionStorage.clear();
	sessionStorage.setItem("dateIn", null);
	sessionStorage.setItem("dateOut", null);

	// Create date input with range mode
	let minDate = flatpickr("#date-range", {
		mode: "range",
		dateFormat: "d-m-Y",
		locale: "es",
		onClose: function (selectedDates, dateStr, instance) {
			let fechaInicio = selectedDates[0]
				? selectedDates[0]
						.toLocaleDateString("es-PE", {
							day: "2-digit",
							month: "2-digit",
							year: "numeric",
						})
						.replace(/\//g, "-")
				: null;
			let fechaFin = selectedDates[1]
				? selectedDates[1]
						.toLocaleDateString("es-PE", {
							day: "2-digit",
							month: "2-digit",
							year: "numeric",
						})
						.replace(/\//g, "-")
				: fechaInicio;
			$.ajax({
				url: "Reporte-PDF-Session",
				type: "post",
				dataType: "json",
				data: { dateIn: fechaInicio, dateOut: fechaFin },
			})
				.done((data) => {})
				.fail((error) => {
					console.log("Error al enviar datos:", error.responseText);
				});
		},
	});

	// Custom filtering function which will search data in column four between two values
	$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
		let startDate = minDate.selectedDates[0];
		let endDate = minDate.selectedDates[1];
		let date = new Date(data[2]);

		if (
			(startDate === undefined && endDate === undefined) ||
			(startDate === undefined && date <= endDate) ||
			(date >= startDate && endDate === undefined) ||
			(date >= startDate && date <= endDate)
		) {
			return true;
		}
		return false;
	});

	// DataTables initialisation
	const t = $("#example").DataTable({
		paging: true, // Habilita la paginación
		pageLength: 15,
		order: [["2", "desc"]],
		language: {
			url: "assets/json/Spanish.json",
		},
		ajax: {
			url: "API-REPORT-SALES",
		},
		columns: [
			{
				data: "idventa",
				render: function (data, type, row) {
					return `${row.serie_comprobante} - ${row.num_comprobante}`;
				},
			},
			{
				data: "cliente",
				render: function (data, type, row) {
					return row.nombreCliente;
				},
			},
			{
				data: "formatted_date",
			},
			{
				data: "tipo_comprobante",
				render: function (data, type, row) {
					const subtotal = row.total_venta - row.impuesto;
					return "S/. " + subtotal;
				},
			},
			{
				data: "impuesto",
				render: function (data, type, row) {
					return "S/. " + data;
				},
			},
			{
				data: "total_venta",
				render: function (data, type, row) {
					return "S/. " + data;
				},
			},
			{
				data: "estado",
				render: function (data, type, row) {
					return '<button class="btn btn-pill btn-info btn-air-info btn-air-info btn_details" type="submit" title="btn btn-info"><i class="fa fa-eye"></i> Info</button>';
				},
			},
		],
	});

	//ACTION MODAL SHOW EDIT
	t.on("click", ".btn_details", function (e) {
		let data = t.row(e.target.closest("tr")).data();
		$.ajax({
			url: "getDetailsSale",
			type: "post",
			data: { i: data.idventa },
			dataType: "json",
			beforeSend: () => {},
		})
			.done((response) => {
				generarFilasTabla(response);

				$("#title_mdl").text(
					data.serie_comprobante + " - " + data.num_comprobante
				);
				$("#redirect_ticket").attr(
					"href",
					"comprobantes/" +
						data.serie_comprobante +
						"-" +
						data.num_comprobante +
						".pdf"
				);
				$("#type_doc").text(data.tipo_documentoCliente);
				$("#name_client").text(data.nombreCliente);
				$("#sale_time").text(data.fecha_hora);
				$("#name_seller").text(data.nombre);
				$("#num_doc").text(data.num_documentoCliente);
				$("#mdl_details").modal("show");
			})
			.fail((e) => {
				console.error(e.responseText);
			});
	});

	// Refilter the table
	$("#date-range").on("change", function () {
		table.draw();
	});
});
function generarFilasTabla(ventas) {
	var tablaBody = document.getElementById("data-sales");
	ventas.forEach(function (venta) {
		var fila = "<tr>";
		fila += "<td>" + venta.nombre_articulo + "</td>";
		fila += "<td>" + venta.cantidad + "</td>";
		fila += "<td>" + venta.precio_detalle + "</td>";
		fila += "<td>" + venta.cantidad * venta.precio_detalle + "</td>"; // Precio Total
		fila += "</tr>";
		tablaBody.innerHTML += fila;
	});
	// Calcular subtotal, IGV y total
	var subtotal = ventas.reduce(
		(acc, venta) => acc + venta.cantidad * venta.precio_detalle,
		0
	);
	var igv = subtotal * 0.18; // Suponiendo que el IGV es el 18% del subtotal
	var total = subtotal + igv;

	// Mostrar valores en las filas de la tabla
	document.getElementById("subtotalValue").textContent = subtotal.toFixed(2);
	document.getElementById("igvValue").textContent = igv.toFixed(2);
	document.getElementById("totalValue").textContent = total.toFixed(2);
}
