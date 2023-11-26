$(() => {
	loadProducts(null);
	loadCategories();
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
const loadProducts = (i) => {
	$.ajax({
		url: "PostArticle",
		method: "POST",
		data: { category: i },
		dataType: "json",
		async: false,
	}).done((i) => {
		const data = i.data;
		// Obtén el contenedor donde deseas agregar los productos
		var productContainer = $(".scroll-product");
		productContainer.empty();
		// Itera sobre los datos y crea elementos HTML para cada producto
		// Construye una cadena de HTML para todos los productos
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
                                    <div class="add-quantity btn border text-gray f-12 f-w-500">
                                        <i class="fa fa-minus remove-minus count-decrease"></i>
                                        <span class="add-btn">Add</span>
                                        <input class="countdown-remove" type="number" value="0">
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
	});
};
