<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Reportes Ventas</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">Reportes Control Temperatura</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body card-no-border">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <div class="mb-3">
                                    <div class="badge-spacing">
                                        <a class="btn btn-danger btn-hover-effect" target="_blank" href="<?= base_url('Ver-Reporte-PDF') ?>" id="export-pdf">
                                            <i class="fa fa-file-pdf-o f-18"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-8">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="date-range" name="date-range" placeholder="Filtra por fechas">
                                        <span class="input-group-text list-light-primary">
                                            <i data-feather="calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped text-center dataTable dtr-inline nowrap">
                                <thead>
                                    <tr>
                                        <th>N° COMPROBANTE</th>
                                        <th>CLIENTE</th>
                                        <th>FECHA</th>
                                        <th>SUBTOTAL</th>
                                        <th>IGV</th>
                                        <th>TOTAL</th>
                                        <th>DETALLES</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdl_details" tabindex="-1" role="dialog" aria-labelledby="mdl_details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                <h3 id="title_mdl" class="modal-header justify-content-center border-0"></h3>

                <div class="modal-body">
                    <div class="card-body filter-cards-view">
                        <div class="col-sm-12 col-lg-12 col-xl-12 text-end">
                            <a id="redirect_ticket" target="_blank" class="btn btn-danger btn-hover-effect"><i class="fa fa-file-pdf-o f-18"></i> IMPRIMIR</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <span class="f-w-600 mb-2 d-block">Nombre Cliente</span>
                                <p id="name_client"></p>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <span class="f-w-600 mb-2 d-block" id="type_doc"></span>
                                <p id="num_doc"></p>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <span class="f-w-600 mb-2 d-block">Nombre Vendedor</span>
                                <p id="name_seller"></p>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <span class="f-w-600 mb-2 d-block">Hora Venta</span>
                                <p id="sale_time"></p>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-dashed">
                                        <thead>
                                            <tr>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio Unitario</th>
                                                <th scope="col">Precio Total </th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-sales">
                                        </tbody>
                                        <tfoot>
                                            <tr id="subtotalRow">
                                                <td colspan="2"></td>
                                                <td>Subtotal:</td>
                                                <td id="subtotalValue"></td>
                                            </tr>
                                            <tr id="igvRow">
                                                <td colspan="2"></td>
                                                <td>IGV:</td>
                                                <td id="igvValue"></td>
                                            </tr>
                                            <tr id="totalRow">
                                                <td colspan="2"></td>
                                                <td>Total:</td>
                                                <td id="totalValue"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>