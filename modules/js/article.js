	$(($) => {
		"use strict";
		fill_category();
		
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
				},
				{
					data: "idarticulo",
				},
			],
		}); //*TABLA CATEGORIA

		//* ABRE MODAL PARA AGREGAR
		$("#btn_add").on("click", (e) => {
			e.preventDefault();
			clearform();
			addCode();
			$("#btn_send").removeClass("hidden");
			$("#btn_edit").addClass("hidden");
			title.html("Agregar Articulo");
			$("#mdl_add").modal("show");
		});
	$("#showCategory").on("click", (e) => {
		e.preventDefault();
		title.html("Agregar Articulo");
		$("#mdl_addCategory").modal("show");
	});

	$("#frm_article input").keyup(function () {
		var form = $("#frm_article").find(':input[type="text"]');
		var check = checkCampos(form);
		console.log(check);
		if (check) {
			$("#btn_send").removeClass("disabled");
		} else {
			$("#btn_send").addClass("disabled");
		}
	});

	//*AGREGA ARTICULO ********************************
	$("#btn_send").on("click", (e) => {
		e.preventDefault();
		let btn = document.querySelector("#btn_send");
		let f = $(this);
		$.ajax({
			url: "saveCategory",
			type: "post",
			data: $("#frm_article").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Categorias";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((v) => {
				console.log(v.data);
				alert_type(
					"Articulo, añadido correctamente",
					"Vista Categoria",
					"success"
				);

				const rowNode = t.row
					.add({
						nombreCategoria: v.data.nombreCategoria,
						descripcionCategoria: v.data.descripcionCategoria,
						condicionCategoria: v.data.condicionCategoria,
						idcategoria: v.id,
					})
					.draw()
					.node();
				$(rowNode).css("color", "green").animate({ color: "black" });
				$("#mdl_add").modal("hide");
			})
			.fail((e) => {
				console.log(e.responseText);
			});
	});

	//**FINALIZA PROCESO AGREGAR CATEGORIA */

	//ACTION MODAL SHOW EDIT
	t.on("click", ".editar_btn", function (e) {
		let data = t.row(e.target.closest("tr")).data();
		title.html("Editar Categoria"); // funcion editar
		$("#btn_send").addClass("hidden");
		$("#btn_edit").removeClass("hidden");
		$("#id_category").val(data.idcategoria);

		$.ajax({
			url: "getCategory",
			type: "post",
			data: { i: data.idcategoria },
			dataType: "json",
			beforeSend: () => {},
		})
			.done((data) => {
				const array = data.result;
				array.forEach((item) => {
					$("#names_c").val(item.nombreCategoria);
					$("#description").val(item.descripcionCategoria);
					$("#condition").val(item.condicionCategoria).change();
					$("#mdl_add").modal("show");
				});
			})
			.fail((e) => {
				console.error(e.responseText);
			});
	});

	$("#btn_edit").on("click", (e) => {
		e.preventDefault();
		$.ajax({
			url: "editCategory",
			type: "post",
			data: $("#frm_article").serialize(),
			dataType: "json",
			beforeSend: () => {},
		}).done((data) => {
			if ((data.rsp = 200)) {
				alert_type("Usuario editado correctamente", "Vista Usuario", "success"); //cambiar
				t.ajax.reload();
			} else {
				alert_type("Error", "Vista Usuario", "error"); //cambiar
			}
		});
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
    let result = '';
    let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    for (var i = 0; i < 11; i++) {
        var r = Math.floor(Math.random() * characters.length);
        result += characters.charAt(r);
    }
    return result;;
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
const fill_category = () => {
	var input = document.querySelector("input[name=basic-tags]");
	new Tagify(input);
	fetch("fillcategory")
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			data.forEach(function (option) {
				const op = document.createElement("option");
				op.value = option.idcategoria;
				op.text = option.nombreCategoria;
				document.getElementById("prdCategoria").appendChild(op);
			});
		});
};
