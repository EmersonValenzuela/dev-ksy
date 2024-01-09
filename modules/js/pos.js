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
			console.log(e);
			
		})
	});
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
