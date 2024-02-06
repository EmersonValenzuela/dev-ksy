$(() => {
	fetch("dashboard/getDataApex")
		.then((response) => {
			// Verificar si la solicitud fue exitosa (código de respuesta 200-299)
			if (!response.ok) {
				throw new Error(`Error de red: ${response.status}`);
			}
			// Convertir la respuesta a formato JSON
			return response.json();
		})
		.then((data) => {
			// Llamar a la función para renderizar el gráfico con los datos
			renderizarGrafico(data);
		})
		.catch((error) => {
			// Manejar errores de red u otros errores
			console.error("Error en la solicitud fetch:", error);
		});
		$()



	fetch("dashboard/getAmount")
		.then((response) => {
			// Verificar si la solicitud fue exitosa (código de respuesta 200-299)
			if (!response.ok) {
				throw new Error(`Error de red: ${response.status}`);
			}
			// Convertir la respuesta a formato JSON
			return response.json();
		})
		.then((data) => {
			// Mostrar los montos en la vista
			document.getElementById(
				"factura"
			).innerText = `S/. ${data.amounts_by_type[1].monto_total}`;
			document.getElementById(
				"boleta"
			).innerText = `S/. ${data.amounts_by_type[0].monto_total}`;
			document.getElementById(
				"nota_venta"
			).innerText = `S/. ${data.amounts_by_type[2].monto_total}`;
			document.getElementById(
				"total_neto"
			).innerText = `S/. ${data.total_amount}`;
		})
		.catch((error) => {
			// Manejar errores de red u otros errores
			console.error("Error en la solicitud fetch:", error);
		});

	
	const datatable = new simpleDatatables.DataTable("#tabla-facturas", {
		perpage: 10,
		// tabIndex: 1,
		search: true,
		sort: true,
		// footer: true,
	});
	new simpleDatatables.DataTable("#tabla-boletas", {
		perpage: 10,
		// tabIndex: 1,
		search: true,
		sort: true,
		// footer: true,
	});
	new simpleDatatables.DataTable(" #tabla-nota-ventas", {
		perpage: 10,
		// tabIndex: 1,
		search: true,
		sort: true,
		// footer: true,
	});
});

// Realizar la solicitud fetch al servidor

// mixed chart
function renderizarGrafico(datos) {
	var options7 = {
		chart: {
			height: 350,
			type: "line",
			stacked: false,
			toolbar: {
				show: false,
			},
		},
		stroke: {
			width: [0, 2, 5],
			curve: "smooth",
		},
		plotOptions: {
			bar: {
				columnWidth: "50%",
			},
		},
		series: [
			{
				name: "Factura",
				type: "area",
				data: getDataForType(datos, "F"),
			},
			{
				name: "Boleta",
				type: "area",
				data: getDataForType(datos, "B"),
			},
			{
				name: "Nota de Venta",
				type: "line",
				data: getDataForType(datos, "N"),
			},
		],
		fill: {
			opacity: [0.85, 0.25, 1],
			gradient: {
				inverseColors: false,
				shade: "light",
				type: "vertical",
				opacityFrom: 0.85,
				opacityTo: 0.55,
				stops: [0, 100, 100, 100],
			},
		},
		labels: generateDateLabels(7),
		markers: {
			size: 0,
		},
		xaxis: {
			type: "datetime",
		},
		yaxis: {
			min: 0,
		},
		tooltip: {
			shared: true,
			intersect: false,
			y: {
				formatter: function (y) {
					if (typeof y !== "undefined") {
						return y.toFixed(0);
					}
					return y;
				},
			},
		},
		legend: {
			labels: {
				useSeriesColors: true,
			},
		},
		colors: [CubaAdminConfig.secondary, "#51bb25", CubaAdminConfig.primary],
	};
	var chart7 = new ApexCharts(document.querySelector("#mixedchart"), options7);
	chart7.render();
}

// Función para generar las etiquetas de fecha dinámicamente
function generateDateLabels(numDays) {
	var today = new Date();
	var dateLabels = [];

	for (var i = numDays - 1; i >= 0; i--) {
		var day = new Date(today);
		day.setDate(today.getDate() - i);
		dateLabels.push(day.toISOString().split("T")[0]);
	}

	return dateLabels;
}

// Función para obtener los datos de ventas para un tipo de comprobante específico
function getDataForType(datos, tipoComprobante) {
	// Filtrar datos para el tipo de comprobante especificado
	var datosFiltrados = datos.filter(function (venta) {
		return venta.tipo_comprobante === tipoComprobante;
	});

	// Crear un array con la cantidad de ventas para cada día
	var data = generateDateLabels(7).map(function (fecha) {
		var ventaDia = datosFiltrados.find(function (venta) {
			return venta.fecha === fecha;
		});
		return ventaDia ? parseInt(ventaDia.total_venta) : 0;
	});

	return data;
}
