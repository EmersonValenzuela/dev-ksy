$(($) => {
    "use strict";
    const title = $("#id_title");
    const t = $("#data-client").DataTable({
        language: {
            url: "assets/json/Spanish.json",
        },
        ajax: {
            url: "Cliente"

        },
        columns: [
            {
                data: "nombrecliente"
            },
            {
                data: "tipo_documento"
            },
            {
                data: "num_documento"
            },
            {
                data: "idcliente",
                render: function (data, type, row) {
                    return btnActions(data);
                },
            }
        ]
    });//agredar cliente
    $("#btn_add").on("click", (e) => {
        e.preventDefault();
        clearform();
        $("#btn_send").removeClass("hidden");
        $("#btn_edit").addClass("hidden");
        title.html("Agregar Cliente");
        $("#mdl_add").modal("show");
    });
    $("#btn_edit").on("click", (e) => {
        e.preventDefault();
        $.ajax({
            url: "editClient",
            type: "post",
            data: $("#frm_client").serialize(),
            dataType: "json",
            beforeSend: () => { }
        }).done((data) => {
            if (data.rsp = 200) {
                alert_type("Usuario editado correctamente", "Vista Usuario", "success");
                t.ajax.reload();
            } else {
                alert_type("Error", "Vista Usuario", "error");
            }
        })
    });

    $("#frm_client input").keyup(function () {
        var form = $("#frm_client").find(':input[type="text"]');
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
            url: "saveClient",
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
                alert_type("Usuario añadido correctamente", "Vista Usuario", "success");

                const rowNode = t.row.add({
                    nombrecliente: v.data.nombre,
                    tipo_documento: v.data.tipo_documento,
                    num_documento: v.data.num_documento,
                    idcliente: v.id,
                }).draw().node();
                $(rowNode)
                    .css('color', 'green')
                    .animate({ color: 'black' });
                $("#mdl_add").modal("hide");
                $("#frm_client")[0].reset();
            })
            .fail((e) => {
                console.log(e.responseText);
            }).always(() => {
                btn.innerHTML =
                '<i class="fa fa-save"></i> Guardar Cliente';
            btn.disabled = false;
            btn.form.firstElementChild.disabled = false;
            });
    });

    t.on('mouseenter', 'td', function () {
        let colIdx = t.cell(this).index().column;
        t
            .cells()
            .nodes()
            .each((el) => el.classList.remove('highlight'));
        t
            .column(colIdx)
            .nodes()
            .each((el) => el.classList.add('highlight'));
    });
    t.on('click', '.editar_btn', function (e) {
        let data = t.row(e.target.closest('tr')).data();
        title.html("Editar Cliente");// funcion editar
        $("#btn_send").addClass("hidden");
        $("#btn_edit").removeClass("hidden");
        $.ajax({
            url: "getCliente",
            type: "post",
            data: { i: data.idcliente },
            dataType: "json",
            beforeSend: () => { }
        }).done((data) => {
            const array = data.result;
            array.forEach(item => {
                $("#names_cli").val(item.nombrecliente);
                $("#type_docc").val(item.tipo_documento).change();
                $("#number_docc").val(item.num_documento);
                $("#address").val(item.direccion);
                $("#phone").val(item.telefono);
                $("#email").val(item.email);
                $("#id_client").val(item.idcliente);
                $("#mdl_add").modal("show");
            });
        }).fail((e) => {
            console.error(e.responseText);
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
					url: "delClient",
					type: "post",
					data: { id: data.idcliente },
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
    $("#frm_client")[0].reset();
}


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


