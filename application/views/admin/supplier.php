<!-- Page Sidebar Ends-->
<!--diseño de la tabla-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Proveedor</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Proveedor</li>
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
                                    <i class="fa fa-plus"></i> Agregar Proveedor
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="data-proveedor">
                                <thead class="text-center">
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>N°Doc</th>
                                        <th>email</th>
                                        <th>Acciones</th>
                                </thead>
                                <tfoot class="text-center">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>N°Doc</th>
                                        <th>Email</th>
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
                <form class="form-bookmark theme-form" id="frm_supplier">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="names_s">Nombre Proveedor</label>
                                    <input class="form-control input-air-primary" id="names_s" name="names_s" type="text" placeholder="Ejem. Nombre de Proveedor" autofocus>
                                    <input class="form-control input-air-primary" id="id_supplier" name="id_supplier" type="hidden" placeholder="Ejem. Nombre de Proveedor" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="type_docs">Tipo de Documento</label>
                                    <select class="form-select input-air-primary" id="type_docs" name="type_docs">
                                        <option value="0" selected disabled>Selecciona el Tipo de Documento</option>
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="number_docs">N° Documento</label>
                                        <input class="form-control input-air-primary input_numb" id="number_docs" type="text" placeholder="Ejem. 3" name="number_docs">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="addresss">Dirección</label>
                                        <input class="form-control input-air-primary" id="addresss" type="text" placeholder="Ejem. 3" name="addresss">
                                    </div>
                                </div>
                                <input type="hidden" id="process">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="phones">Telefono</label>
                                        <input class="form-control input-air-primary input_numb" id="phones" type="text" placeholder="Ejem. 3" name="phones">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="emails">Correo Electronico</label>
                                        <input class="form-control input-air-primary" id="emails" type="text" placeholder="Ejem. 3" name="emails">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                            <button class="btn btn-info disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Proveedor</button>
                            <button class="btn btn-info hidden" type="submit" id="btn_edit"><i class="fa fa-edit"></i> Editar Proveedor</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>