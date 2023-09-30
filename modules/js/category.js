$(($) => {
    "use strict";
    const title = $("#id_title");
    const t = $("#data-categoria").DataTable({
        language: {
            url: "assets/json/Spanish.json",
        },
        ajax: {
            url: "Categoria"
        },
        columns: [
            {
                data: "nombre"
            },
            {
                data: "descripcion"
            },
            {
                data: "condicion",
                render: function (data, type, row) {
                    return condicion(data);
                },
            },
            {
                data: "idcategoria",
                render: function (data, type, row) {
                    return btnActions(data);
                },
            }
        ]
    });//agredar usuario
    $("#btn_add").on("click", (e) => {
        e.preventDefault();
        clearform();
        $("#btn_send").removeClass("hidden");
        $("#btn_edit").addClass("hidden");
        title.html("Agregar Categoria");
        $("#mdl_add").modal("show");
    });
    $("#btn_edit").on("click", (e) => {
        e.preventDefault();
        $.ajax({
            url: "editCategory",
            type: "post",
            data: $("#frm_category").serialize(),
            dataType: "json",
            beforeSend: () => { }
        }).done((data) => {
            if (data.rsp = 200) {
                alert_type("Usuario editado correctamente", "Vista Usuario", "success");//cambiar
                t.ajax.reload();
            } else {
                alert_type("Error", "Vista Usuario", "error");//cambiar
            }
        })
    });

    $("#frm_category input").keyup(function () {
        var form = $("#frm_category").find(':input[type="text"]');
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
                console.log(v.data);
                alert_type("Categoria añadido correctamente", "Vista Categoria", "success");

                const rowNode = t.row.add({
                    nombre: v.data.nombre,
                    descripcion: v.data.descripcion,
                    condicion: v.data.condicion,
                    idcategoria: v.data.idcategoria,
                }).draw().node();
                $(rowNode)
                    .css('color', 'green')
                    .animate({ color: 'black' });
                $("#mdl_add").modal("hide");
                $("#frm_category")[0].reset();
            })
            .fail((e) => {
                console.log(e.responseText);
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
        title.html("Editar Categoria");// funcion editar
        $("#btn_send").addClass("hidden");
        $("#btn_edit").removeClass("hidden");
        $.ajax({
            url: "getCategoria",
            type: "post",
            data: { i: data.idcategoria },
            dataType: "json",
            beforeSend: () => { }
        }).done((data) => {
            const array = data.result;
            array.forEach(item => {
                $("#names_c").val(item.nombre);
                $("#description").val(item.descripcion);
                $("#condition").val(item.condicion).change();
                $("#id_category").val(item.idusuario);
                $("#mdl_add").modal("show");
            });
        }).fail((e) => {
            console.error(e.responseText);
        });
    });
    t.on('click', '.btn_delete', function (e) {
        let data = t.row(e.target.closest('tr')).data();


        //EDITAR TEXTO
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delUsuario",
                    type: "post",
                    data: { id: data.idusuario },
                    dataType: "json",
                    beforeSend: () => { }
                }).done((data) => {
                    if (data.rsp = true) {
                        alert_type("Usuario eliminado correctamente", "Vista Usuario", "success");
                        t.ajax.reload();
                    }
                }).fail((e) => {
                    console.error(e.responseText);
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });

});

const clearform = () => {
    $("#frm_category")[0].reset();
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


