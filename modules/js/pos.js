$(() => {
	loadProducts(null);
	loadCategories();
	getClient(0);
	$("#p-categories").on("input", function () {
		var inputValue = $(this).val();
		var selectedOption = $(
			"#data-categories option[value='" + inputValue + "']"
		);

		if (selectedOption.length > 0) {
			var dataId = selectedOption.data("id");
			loadProducts(dataId);
		} else {
			loadProducts(null);
		}
	});

	$("#p-search").on("input", function () {
		var searchTerm = $(this).val().toLowerCase();

		// Filtra los productos basados en el término de búsqueda
		$(".our-product-wrapper").each(function () {
			var productText = $(this).text().toLowerCase();
			$(this).toggle(productText.includes(searchTerm));
		});
	});

	// go 
	$("#go-payment").on("click", function () {
		carrito.client = $("#select-customer").val();
		carrito.voucher = $("#select-method").val();
		carrito.payment = $("#method-payment").text();
		carrito.total_price = $("#total-price").text();

		$.ajax({
			url: "saveSale",
			type: "post",
			dataType: "json",
			data: { carrito: carrito }
		}).done((e) => {

			// URL de la imagen
			const imagePath = "http://localhost/dev-ksy/assets/images/logo/logo2.png";
			// Array para almacenar detalles de la venta
			var saleDetails = [];

			// Array para almacenar filas de la tabla de detalles
			var tableRows = [];

			// Iterar sobre las propiedades del objeto
			for (var key in carrito) {
				// Verificar si la clave es numérica
				if (!isNaN(key)) {
					var value = carrito[key];

					// Construir objeto de detalles de la venta
					var saleDetail = {
						idventa: key, // Supongamos que la clave es el id de la venta
						idarticulo: value.articulo.idarticulo,
						nombre_articulo: value.articulo.nombre_articulo,
						cantidad: value.cantidad,
						precio_unitario: value.articulo.precio_venta,
						precio_total: (value.cantidad * value.articulo.precio_venta).toFixed(2)
					};

					// Agregar el objeto de detalles al array
					saleDetails.push(saleDetail);

					// Construir una fila para la tabla de detalles
					var tableRow = [
						saleDetail.nombre_articulo,
						saleDetail.cantidad,
						saleDetail.precio_unitario,
						saleDetail.precio_total
					];

					// Agregar la fila al array de filas de la tabla
					tableRows.push(tableRow);
				}
			}
			var igv = (18 * carrito.total_price) / 100;
			igv = igv.toFixed(2);
			var subotal = carrito.total_price - igv;
			subotal = subotal.toFixed(2);
			// Convertir la imagen a dataURL
			toDataURL(imagePath, function (dataURL) {
				// Obtener la fecha y hora actual formateada con moment.js
				var currentDate = moment().format("DD/MM/YYYY HH:mm:ss");

				// Crear un documento PDF con pdfmake y establecer los márgenes
				var docDefinition = {
					content: [
						{
							image: dataURL, // Utilizar la cadena dataURL de la imagen
							width: 200, // Ancho de la imagen
							alignment: "center"
						},
						{ text: '\nTicket de Venta', style: 'header', alignment: 'center' },
						{ text: '\n' + carrito.voucher + '001 - ' + e.id, style: 'header', alignment: 'center' },
						{ text: '\n' + currentDate, alignment: 'right' },
						{ text: '\nVendedor: ' + e.user + '\n\n\n', alignment: 'center' },
						{
							table: {
								headerRows: 1,
								widths: ['*', 'auto', 'auto', 'auto'], // '*' significa ancho automático
								body: [
									[{ text: 'Nombre de Producto', bold: true }, { text: 'Cantidad', bold: true }, { text: 'Precio Unitario', bold: true }, { text: 'Precio Total', bold: true }],
									...tableRows
								]
							},
							layout: 'lightHorizontalLines', // Añadir líneas horizontales ligeras
							style: 'tableStyle'
						},
						{
							columns: [
								{ text: '\n\nSubtotal', alignment: 'right' },
								{ text: '\n\n' + subotal, alignment: 'right' }
							]
						},
						{
							columns: [
								{ text: 'IGV', alignment: 'right' },
								{ text: igv, alignment: 'right' }
							]
						},
						{

							columns: [
								{ text: 'Total', alignment: 'right' },
								{ text: carrito.total_price, alignment: 'right' }
							]
						},
						{
							text: '\n\nMétodo de pago: ' + carrito.payment + '\n\n\n', alignment: 'center'
						},
						{ qr: 'text in QR', alignment: 'center' }
					],
					styles: {
						header: { fontSize: 18, bold: true },
					},
					// Establecer los márgenes del documento
					margin: [30, 30, 30, 30] // Márgenes: arriba, derecha, abajo, izquierda
				};

				// Generar el PDF
				var pdfDoc = pdfMake.createPdf(docDefinition);

				// Convertir el PDF a un blob
				pdfDoc.getBlob((blob) => {
					// Crear una URL para el blob
					var url = URL.createObjectURL(blob);

					// Abrir una nueva ventana y cargar el PDF
					var ticketWindow = window.open(url, '_blank');
				});

			});
		});
	});

	// Función para convertir una imagen a dataURL
	function toDataURL(url, callback) {
		var xhr = new XMLHttpRequest();
		xhr.onload = function () {
			var reader = new FileReader();
			reader.onloadend = function () {
				callback(reader.result);
			};
			reader.readAsDataURL(xhr.response);
		};
		xhr.open('GET', url);
		xhr.responseType = 'blob';
		xhr.send();
	}




	$("#btn_send").on("click", (e) => {
		e.preventDefault();
		let btn = document.querySelector("#btn_send");
		let f = $(this);

		$.ajax({
			url: "saveClients",
			type: "post",
			data: $("#frm_client").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Cliente";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((v) => {
				console.log(v.data);
				alert_type("Cliente añadido correctamente", "Vista POS", "success");
				getClient(v.id);
				$("#dashboard8").modal("hide");
				$("#frm_client")[0].reset();
			})
			.fail((e) => {
				console.log(e.responseText);
			})
			.always(() => {
				btn.innerHTML = '<i class="fa fa-save"></i> Guardar Cliente';
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});
});
const loadCategories = () => {
	$.ajax({
		url: "Categorias",
		method: "GET",
		dataType: "json",
		async: false,
	}).done((i) => {
		const categorias = i.data;
		const datalistElement = document.getElementById("data-categories");

		categorias.forEach(function (categoria) {
			var option = document.createElement("option");
			option.value = categoria.nombreCategoria;
			option.setAttribute("data-id", categoria.idcategoria);
			datalistElement.appendChild(option);
		});
	});
};
const carrito = {};

const loadProducts = (category) => {
	$.ajax({
		url: "PostArticle",
		method: "POST",
		data: { category: category },
		dataType: "json",
		async: false,
	}).done((response) => {
		const data = response.data;

		// Obtén el contenedor donde deseas agregar los productos
		var productContainer = $(".scroll-product");
		productContainer.empty();

		// Itera sobre los datos y crea elementos HTML para cada producto
		var productsHTML = data
			.map(
				(articulo) => `
                    <div class="col-xxl-3 col-sm-4">
                        <div class="our-product-wrapper h-100 widget-hover">
                            <div class="our-product-img"><img src="modules/uploads/${articulo.imagen_articulo}" alt="${articulo.nombre_articulo}"></div>
                            <div class="our-product-content">
                                <h6 class="f-14 f-w-500 pt-2 pb-1">${articulo.nombre_articulo}</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="txt-primary">S/. ${articulo.precio_venta}</h6>
                                    <div class="add-quantity btn border text-gray f-12 f-w-500 btn-shop" data-id="${articulo.idarticulo}">
                                        <i class="fa fa-plus count-increase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `
			)
			.join("");

		// Agrega la cadena de HTML al contenedor principal en un solo paso
		productContainer.html(productsHTML);
		// Después de agregar los elementos al DOM, ahora puedes agregar el evento de clic
		const botonesShop = document.querySelectorAll(".btn-shop");

		botonesShop.forEach(function (boton) {
			boton.addEventListener("click", function () {
				const idArticulo = this.getAttribute("data-id");

				// Convierte los datos a un array si no lo es
				const dataArray = Array.isArray(data) ? data : Object.values(data);

				const selectArticle = dataArray.find(function (articulo) {
					return articulo.idarticulo === idArticulo;
				});

				// Verifica si el artículo ya está en el carrito
				if (carrito[idArticulo]) {
					// Si ya está en el carrito, incrementa la cantidad
					carrito[idArticulo].cantidad++;
				} else {
					// Si no está en el carrito, agrégalo con cantidad 1
					carrito[idArticulo] = {
						articulo: selectArticle,
						cantidad: 1,
					};
				}
				// Actualiza la interfaz de usuario
				actualizarCarrito();
				eliminarCarrito();

				let getInputByClass =
					document.getElementsByClassName("input-touchspin");

				Array.from(getInputByClass).forEach((elem, i) => {
					let inputData = elem.getAttribute("value");

					let isIncrement = elem.parentNode.querySelectorAll(
						".increment-touchspin"
					);
					let isDecrement = elem.parentNode.querySelectorAll(
						".decrement-touchspin"
					);
					if (isIncrement) {
						isIncrement[0].addEventListener("click", function () {
							let inc = this.getAttribute("data-increment");
							inputData++;

							if (carrito.hasOwnProperty(idArticulo)) {
								let item = carrito[idArticulo];
								if (item) {
									// Actualiza la cantidad del artículo en el carrito
									item.cantidad = inputData;

									// Actualiza el precio y el carrito
									Quantity();
								}
							}
							elem.setAttribute("value", inputData);
						});
					}
					if (isDecrement) {
						isDecrement[0].addEventListener("click", function () {
							if (inputData > 0) {
								let inc = this.getAttribute("data-increment");
								inputData--;

								if (carrito.hasOwnProperty(idArticulo)) {
									let item = carrito[idArticulo];
									if (item) {
										// Actualiza la cantidad del artículo en el carrito
										item.cantidad = inputData;

										// Actualiza el precio y el carrito
										Quantity();
									}
								}
								elem.setAttribute("value", inputData);
							}
						});
					}
				});
			});
		});
	});
};

function actualizarCarrito() {
	const itemContainer = $(".order-quantity");

	// Construye el HTML basado en el contenido del carrito
	const carritoHtml = Object.values(carrito)
		.map(
			(item) => `
            <div class="order-details-wrapper">
                <div class="left-details">
                    <div class="order-img widget-hover"><img src="modules/uploads/${item.articulo.imagen_articulo}" alt="phone"></div>
                </div>
                <div class="category-details">
                    <div class="order-details-right"><span class="text-gray mb-1">
                        <h6 class="f-15 f-w-600 mb-3">${item.articulo.nombre_articulo}</h6>
                        <div class="last-order-detail">
                            <h6 class="txt-primary">S/. ${item.articulo.precio_venta}</h6><a href="javascript:void(0)"> <i class="fa fa-trash trash-remove" data-remove="${item.articulo.idarticulo}"></i></a>
                        </div>
                    </div>
                    <div class="right-details">
                        <div class="touchspin-wrapper">
                            <button disabled class="decrement-touchspin btn-touchspin" data-decrement="${item.articulo.idarticulo}"></button>
                            <input class="input-touchspin"  id="inputData" type="number" value="${item.cantidad}">
                            <button disabled class="increment-touchspin btn-touchspin" data-increment="${item.articulo.idarticulo}"></button>
                        </div>
                    </div>
                </div>
            </div>
        `
		)
		.join("");

	// Actualiza la interfaz de usuario con el contenido del carrito
	itemContainer.html(carritoHtml);
	// Inicializa el monto total
	Quantity();
}
function eliminarCarrito() {
	const productDetails = document.getElementsByClassName(
		"order-details-wrapper"
	);

	productDetails.forEach((item, index) => {
		let deleteButton = item.querySelector(".trash-remove");

		deleteButton.addEventListener("click", function () {
			const idArticulo = this.getAttribute("data-remove");

			// Elimina el producto del carrito utilizando el idArticulo
			delete carrito[idArticulo];

			// Elimina el elemento del DOM
			item.remove();
			Quantity();
		});
	});
}

function Quantity() {
	let montoTotal = 0;

	// Recorre el carrito y suma los precios de cada artículo multiplicado por su cantidad
	for (const idArticulo in carrito) {
		if (carrito.hasOwnProperty(idArticulo)) {
			const articulo = carrito[idArticulo].articulo;
			const cantidad = carrito[idArticulo].cantidad;
			const precioArticulo = parseFloat(articulo.precio_venta); // Convierte el precio a un número

			// Aumenta el monto total
			montoTotal += precioArticulo * cantidad;
		}
	}
	$("#total-price").text(montoTotal.toFixed(2));
}

function getClient(id) {
	$.ajax({
		url: "Clientes",
		method: "GET",
		dataType: "json",
		async: false,
	}).done((i) => {
		const clients = i.data;
		const customers = document.getElementById("select-customer");
		customers.innerHTML = "";

		clients.forEach(function (client) {
			var option = document.createElement("option");
			option.value = client.idcliente;
			option.text = client.nombreCliente;
			if (id == client.idcliente) {
				option.selected = true;
			}
			customers.appendChild(option);
		});
	});
}

const btnMethods = document.querySelectorAll(".bg-payment");
const textMethod = document.getElementById("method-payment");

btnMethods.forEach(function (boton) {
	boton.addEventListener("click", function () {
		const name = this.getAttribute("data-name");
		textMethod.innerText = name;
	});
});
