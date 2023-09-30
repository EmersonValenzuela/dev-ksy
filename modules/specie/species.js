$(($) => {
	"use strict";
	const t = $("#data-species").DataTable({
		language: {
			url: "../assets/json/Spanish.json",
		},
		ajax: {
			url: "API-SPECIES",
		},
		columns: [
			{
				data: "common_specie",
			},
			{
				data: "scientific_specie",
			},
			{
				data: "type_water",
			},
			{
				data: "amount_fish",
			},
			{
				data: "status",
			},
			{
				data: "id_specie",
			},
		],
	});
	$("#type_water, #status").select2({
		dropdownParent: $("#mdl_add .modal-body"),
	});
	$("#btn_add").on("click", (e) => {
		e.preventDefault();
		$("#mdl_add").modal("show");
		$("#process").val("save");
	});

	$("#frm_specie input").keyup(function () {
		var form = $("#frm_specie").find(':input[type="text"]');
		var check = checkCampos(form);
		console.log(check);
		if (check) {
			$("#btn_send").removeClass("disabled");
		} else {
			$("#btn_send").addClass("disabled");
		}
	});

	$("#btn_send").on("click", (e) => {
		let btn = document.querySelector("#btn_send");
		e.preventDefault();
		$.ajax({
			url: "save-specie",
			type: "post",
			data: $("#frm_specie").serialize(),
			dataType: "json",
			beforeSend: () => {
				btn.innerHTML =
					"<i class='fa fa-spin fa-spinner'></i> Guardando Especie";
				btn.disabled = true;
				btn.form.firstElementChild.disabled = true;
			},
		})
			.done((r) => {
				console.log(r);
				alert_type("Especie añadido correctamente", "Vista Especie", "success");
				t.row
					.add([
						r.data["common_specie"],
						r.data["scientific_specie"],
						r.data["type_water"],
						r.data["amount_fish"],
						r.data["status"],
						r.data["common_specie"],
					])
					.draw(false);
			})
			.fail((e) => {
				console.log(e.responseText);

				alert_type(
					"Error del servidor, Comunicarse con SISTEMAS",
					"Vista Especie",
					"error"
				);
			})
			.always(() => {
				btn.innerHTML = "<i class='fa fa-save'></i> Guardar Especie";
				btn.disabled = false;
				btn.form.firstElementChild.disabled = false;
			});
	});
});
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
