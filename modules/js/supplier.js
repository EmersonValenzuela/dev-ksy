$(($) => {
	"use strict";
	const title = $("#id_title");
	const t = $("#data-proveedor").DataTable({
		language: {
			url: "assets/json/Spanish.json",
		},
		ajax: {
			url: "Proveedores",
		},
		columns: [
			{
				data: "nombreProveedor",
			},
			{
				data: "tipo_documentoProveedor",
			},
			{
				data: "num_documentoProveedor",
			},
			{
				data: "emailProveedor",
			},
			{
				data: "idproveedor",
				render: function (data, type, row) {
					return btnActions(data);
				},
			},
		],
	});

	//agregar Proveedor
	$("#btn_add").on("click", (e) => {
		e.preventDefault();
		clearform();
		$("#btn_send").removeClass("hidden");
		$("#btn_edit").addClass("hidden");
		title.html("Agregar Proveedor");
		$("#mdl_add").modal("show");
	});


	$("#frm_supplier input").keyup(function () {
		var form = $("#frm_supplier").find(':input[type="text"]');
		var check = checkCampos(form);
		console.log(check);
		if (check) {
			$("#btn_send").removeClass("disabled");
		} else {
			$("#btn_send").addClass("disabled");
		}
	});

	$("#btn_send").on("click", (e) => {
		e.preventDefault();
		let btn = document.querySelector("#btn_send");
		let f = $(this);

		$.ajax({
			url: "saveSupplier",
			type: "post",
			data: $("#frm_supplier").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Proveedor";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((v) => {
				console.log(v.data);
				alert_type(
					"Proveedor añadido correctamente",
					"Vista Proveedor",
					"success"
				);

				const rowNode = t.row
					.add({
						nombreProveedor: v.data.nombreProveedor,
						tipo_documentoProveedor: v.data.tipo_documentoProveedor,
						num_documentoProveedor: v.data.num_documentoProveedor,
						direccionProveedor: v.data.direccionProveedor,
						emailProveedor: v.data.emailProveedor,
						idproveedor: v.id,
					})
					.draw()
					.node();
				$(rowNode).css("color", "green").animate({ color: "black" });
				$("#mdl_add").modal("hide");
				$("#frm_supplier")[0].reset();
			})
			.fail((e) => {
				console.log(e.responseText);
			})
			.always(() => {
				btn.innerHTML = '<i class="fa fa-save"></i> Guardar Proveedor';
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});

	t.on("mouseenter", "td", function () {
		let colIdx = t.cell(this).index().column;
		t.cells()
			.nodes()
			.each((el) => el.classList.remove("highlight"));
		t.column(colIdx)
			.nodes()
			.each((el) => el.classList.add("highlight"));
	});

	//ACTION MODAL SHOW EDIT
	t.on("click", ".editar_btn", function (e) {
		let data = t.row(e.target.closest("tr")).data();
		title.html("Editar Proveedor"); // funcion editar
		$("#btn_send").addClass("hidden");
		$("#btn_edit").removeClass("hidden");
		$.ajax({
			url: "getSupplier",
			type: "post",
			data: { i: data.idproveedor },
			dataType: "json",
			beforeSend: () => {},
		})
			.done((data) => {
				const array = data.result;
				array.forEach((item) => {
					$("#names_s").val(item.nombreProveedor);
					$("#type_docs").val(item.tipo_documentoProveedor).change();
					$("#number_docs").val(item.num_documentoProveedor);
					$("#addresss").val(item.direccionProveedor);
					$("#phones").val(item.telefonoProveedor);
					$("#emails").val(item.emailProveedor);
					$("#id_supplier").val(item.idproveedor);
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
			url: "editSupplier",
			type: "post",
			data: $("#frm_supplier").serialize(),
			dataType: "json",
			beforeSend: () => {},
		}).done((data) => {
			if ((data.rsp = 200)) {
				alert_type(
					"Proveedor editado correctamente",
					"Vista Proveedor",
					"success"
				);
				t.ajax.reload();
			} else {
				alert_type("Error", "Vista Usuario", "error");
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
					url: "delSupplier",
					type: "post",
					data: { id: data.idproveedor },
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

const clearform = () => {
	$("#frm_supplier")[0].reset();
};

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
