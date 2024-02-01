$(($) => {
	"use strict";
	fill_category();
	var input = document.querySelector("input[name=basic-tags]");
	new Tagify(input);
	const title = $("#id_title");
	const t = $("#data-articulo").DataTable({
		language: {
			url: "assets/json/Spanish.json",
		},
		ajax: {
			url: "Articulos",
		},
		columns: [
			{
				data: "codigo_articulo",
			},
			{
				data: "nombre_articulo",
			},
			{
				data: "nombreCategoria",
			},
			{
				data: "stock_articulo",
			},
			{
				data: "condicion_articulo",
				render: function (data, type, row) {
					return condition(data);
				},
			},
			{
				data: "idarticulo",
				render: function (data, type, row) {
					return btnActions(data);
				},
			},
		],
	}); //*TABLA ARTICULO

	//* ABRE MODAL PARA AGREGAR
	$("#btn_add").on("click", (e) => {
		e.preventDefault();
		clearform();

		addCode();
		$("#btn-update").addClass("hidden");
		$("#btn-new").removeClass("hidden");
		title.html("Agregar Articulo");
		$("#mdl_add").modal("show");
	});

	$("#showCategory").on("click", (e) => {
		e.preventDefault();
		title.html("Agregar Articulo");
		$("#mdl_addCategory").modal("show");
	});

	$("#btn-new-article").on("click", (e) => {
		const submitButton = $(e.target);
		const tags = document.getElementById("basic-tags").value;
		const dataTags = JSON.parse(tags);
		const valuesArray = dataTags.map((obj) => obj.value);
		const resultTags = valuesArray.join(",");

		const inputFile = document.getElementById("prdImage");

		const formData = new FormData(document.getElementById("form-new-article"));
		formData.append("tags", resultTags);
		formData.append("archivo", inputFile.files[0]);
		fetch("saveArticles", {
			method: "POST",
			body: formData,
		})
			.then((response) => response.json())
			.then((data) => {
				alert_type(
					"Articulo añadido correctamente",
					"Vista Articulo",
					"success"
				);
				t.ajax.reload();
				$("#mdl_add").modal("hide");
				$("#form-new-article")[0].reset();

				// Reactiva el botón y restaura su texto original
				submitButton.disabled = false;
				submitButton.textContent = "Enviar";
			})
			.catch((error) => {
				console.error("Error:", error);

				// En caso de error, asegúrate de reactivar el botón y restaurar su texto
				submitButton.disabled = false;
				submitButton.textContent = "Enviar";
			});
	});

	$("#btn-update-article").on("click", (e) => {
		const submitButton = $(e.target);
		const tags = document.getElementById("basic-tags").value;
		const dataTags = JSON.parse(tags);
		const valuesArray = dataTags.map((obj) => obj.value);
		const resultTags = valuesArray.join(",");

		const inputFile = document.getElementById("prdImage");

		const formData = new FormData(document.getElementById("form-new-article"));
		formData.append("tags", resultTags);
		formData.append("archivo", inputFile.files[0]);
		fetch("editArticle", {
			method: "POST",
			body: formData,
		})
			.then((response) => response.json())
			.then((data) => {
				alert_type(
					"Articulo actualizado correctamente",
					"Vista Articulo",
					"success"
				);
				t.ajax.reload();
				$("#mdl_add").modal("hide");
				$("#form-new-article")[0].reset();

				// Reactiva el botón y restaura su texto original
				submitButton.disabled = false;
				submitButton.textContent = "Actualizar";
			})
			.catch((error) => {
				console.error("Error:", error);

				// En caso de error, asegúrate de reactivar el botón y restaurar su texto
				submitButton.disabled = false;
				submitButton.textContent = "Enviar";
			});
	});

	//** CIERRA MODAL AGREGAR CATEGORIA */

	//*AGREGA CATEGORIA ********************************
	$("#frm_category input").keyup(function () {
		var form = $("#frm_category").find(':input[type="text"]');
		var check = checkCampos(form);
		console.log(check);
		if (check) {
			$("#btn_sendCategory").removeClass("disabled");
		} else {
			$("#btn_sendCategory").addClass("disabled");
		}
	});

	$("#btn_sendCategory").on("click", (e) => {
		e.preventDefault();
		let btn = document.querySelector("#btn_sendCategory");
		let f = $(this);
		$.ajax({
			url: "saveCategory",
			type: "post",
			data: $("#frm_category").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Categorias";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((v) => {
				fill_category(v.id);
				alert_type(
					"Categoria, añadido correctamente",
					"Vista Categoria",
					"success"
				);

				$("#mdl_addCategory").modal("hide");
			})
			.fail((e) => {
				console.log(e.responseText);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-save'></i> Guardar Categoria";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	//**FINALIZA PROCESO AGREGAR CATEGORIA */

	//ACTION MODAL SHOW EDIT
	t.on("click", ".editar_btn", function (e) {
		let data = t.row(e.target.closest("tr")).data();
		title.html("Editar Articulo"); // funcion editar
		$("#btn-new").addClass("hidden");
		$("#btn-update").removeClass("hidden");
		$("#idArticle").val(data.idarticulo);

		$("#codProduc").val(data.codigo_articulo);
		$("#productTitle1").val(data.nombre_articulo);
		$("#prdDescription").val(data.descripcion_articulo);
		$("#prdCategoria").val(data.categoria).prop("selected", true);
		$("#basic-tags").val(data.etiquetaArticulo);
		$("#publishStatus").val(data.condicion_articulo).prop("selected", true);
		$("#initialCost").val(data.precio_compra);
		$("#sellingPrice").val(data.precio_venta);
		$("#prdChoose").val(data.tipoCambio);
		$("#productStock1").val(data.stock_articulo);

		$("#mdl_add").modal("show");
	});

	t.on("click", ".btn_delete", function (e) {
		let data = t.row(e.target.closest("tr")).data();

		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "delCategory",
					type: "post",
					data: { id: data.idcategoria },
					dataType: "json",
					beforeSend: () => {},
				})
					.done((data) => {
						if ((data.rsp = true)) {
							Swal.fire("Deleted!", "Your file has been deleted.", "success");
							t.ajax.reload();
						}
					})
					.fail((e) => {
						console.error(e.responseText);
					});
			}
		});
	});
});

async function generateCode() {
	let result = "";
	let characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for (var i = 0; i < 11; i++) {
		var r = Math.floor(Math.random() * characters.length);
		result += characters.charAt(r);
	}
	return result;
}

const addCode = () => {
	generateCode().then(function (code) {
		document.getElementById("codProduc").value = code;
	});
};

const clearform = () => {};

const btnActions = (i) => {
	return `<button type="button" class="editar_btn btn btn-pill btn-warning btn-air-warning"><i class="fa fa-edit"></i></button> <button type="button" class="btn_delete btn btn-pill btn-danger btn-air-danger" ><i class="fa fa-trash"></i></button>`;
};
function condition(v) {
	if (v == 1) {
		return '<span class="badge badge-success">Activo</span>';
	}
	return '<span class="badge badge-danger">Inactivo</span>';
}
const checkCampos = (obj) => {
	var camposRellenados = true;
	obj.each(function () {
		var $this = $(this);
		if ($this.val().length <= 0) {
			camposRellenados = false;
			return false;
		}
	});
	if (camposRellenados == false) {
		return false;
	} else {
		return true;
	}
};
const fill_category = (id = null) => {
	$("#prdCategoria").empty();
	fetch("fillcategory")
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			data.forEach(function (option) {
				const op = document.createElement("option");
				op.value = option.idcategoria;
				op.text = option.nombreCategoria;
				if (id != null && id == option.idcategoria) {
					op.selected = true;
				}
				document.getElementById("prdCategoria").appendChild(op);
			});
		});
};
