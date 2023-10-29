<!-- Page Sidebar Ends-->
<!--diseño de la tabla-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Cliente</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Cliente</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Add rows  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h5 class="m-0"></h5>
                            <div class="card-header-right-icon">
                                <button id="btn_add" class="btn btn-pill btn-success btn-air-success" type="submit">
                                    <i class="fa fa-plus"></i> Agregar Cliente
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="data-cliente">
                                <thead class="text-center">
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>N°Dni</th>
                                        <th>email</th>
                                        <th>Acciones</th>
                                </thead>
                                <tfoot class="text-center">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>N°Dni</th>
                                        <th>email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add rows Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="mdl_add" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="id_title"></h4>
                <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark theme-form" id="frm_client">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="names_cli">Apellidos y Nombres</label>
                                    <input class="form-control input-air-primary" id="names_cli" name="names_cli" type="text" placeholder="Ejem. Nombre de Cliente" autofocus>
                                    <input class="form-control input-air-primary" id="id_client" name="id_client" type="hidden" placeholder="Ejem. Nombre de Cliente" autofocus>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="type_docc">Tipo de Documento</label>
                                    <select class="form-select input-air-primary" id="type_docc" name="type_docc">
                                        <option value="0" selected disabled>Seleccione</option>
                                        <option value="DNI">DNI</option>
                                        <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                                        <option value="RUC">RUC</option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="number_docc">Numero de Documento</label>
                                        <input class="form-control input-air-primary input_numb" id="number_docc" type="text" placeholder="Ejem. 3" name="number_docc">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="addressc">Dirección</label>
                                        <input class="form-control input-air-primary" id="addressc" type="text" placeholder="Ejem. 3" name="addressc">
                                    </div>
                                </div>
                                <input type="hidden" id="process">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="phonec">Telefono o Celular</label>
                                        <input class="form-control input-air-primary input_numb" id="phonec" type="text" placeholder="Ejem. 3" name="phonec">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="emailc">Correo Electronico</label>
                                        <input class="form-control input-air-primary" id="emailc" type="text" placeholder="Ejem. 3" name="emailc">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                            <button class="btn btn-info disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Cliente</button>
                            <button class="btn btn-info hidden" type="submit" id="btn_edit"><i class="fa fa-edit"></i> Editar Cliente</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>