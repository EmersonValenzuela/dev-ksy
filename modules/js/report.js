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
			.done((data) => {
				console.log(data);
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
