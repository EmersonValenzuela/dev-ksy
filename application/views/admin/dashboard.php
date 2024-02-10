<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Registro de Ventas </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
                <div class="card widget-1">
                    <div class="card-body">
                        <div class="widget-content">
                            <div class="widget-round secondary">
                                <div class="bg-round">
                                    <svg class="svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#cart"> </use>
                                    </svg>
                                    <svg class="half-circle svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 id="factura"></h4><span class="f-light">Facturas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
                <div class="card widget-1">
                    <div class="card-body">
                        <div class="widget-content">
                            <div class="widget-round primary">
                                <div class="bg-round">
                                    <svg class="svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#tag"> </use>
                                    </svg>
                                    <svg class="half-circle svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 id="boleta"></h4><span class="f-light">Boletas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
                <div class="card widget-1">
                    <div class="card-body">
                        <div class="widget-content">
                            <div class="widget-round warning">
                                <div class="bg-round">
                                    <svg class="svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#return-box"> </use>
                                    </svg>
                                    <svg class="half-circle svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 id="nota_venta"></h4><span class="f-light">Nota de Venta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
                <div class="card widget-1">
                    <div class="card-body">
                        <div class="widget-content">
                            <div class="widget-round success">
                                <div class="bg-round">
                                    <svg class="svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#rate"> </use>
                                    </svg>
                                    <svg class="half-circle svg-fill">
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 id="total_neto"></h4><span class="f-light">Total Neto</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-12 box-col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="mixedchart"> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>Facturas</a></li>
                                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Boletas</a></li>
                                <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Notas de Venta</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="projectcreate.html"> <i data-feather="plus-square"> </i>Realizar Venta</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="list-product list-category">
                                    <table class="table" id="tabla-facturas">
                                        <thead>
                                            <tr>
                                                <th> <span class="f-light f-w-600">Fecha</span></th>
                                                <th> <span class="f-light f-w-600">comprobante</span></th>
                                                <th> <span class="f-light f-w-600">Cliente</span></th>
                                                <th> <span class="f-light f-w-600">Total</span></th>
                                                <th> <span class="f-light f-w-600">Acciones</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($facturas as $key => $factura) : ?>
                                                <tr class="product-removes">
                                                    <td>
                                                        <p class="f-light"><?= $factura->fecha_hora ?></p>
                                                    </td>
                                                    <td>
                                                        <div class="product-names">
                                                            <p><?= $factura->serie_comprobante . " - " . $factura->num_comprobante   ?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light"><?= $factura->nombreCliente ?></p>
                                                    </td>
                                                    <td> <span class="badge badge-light-primary"><?= "S/ " . $factura->total_venta ?></span></td>
                                                    <td>
                                                        <a href="comprobantes/<?= $factura->serie_comprobante . "-" . $factura->num_comprobante . ".pdf" ?>" target="_blank" class="btn btn-danger btn-hover-effect"><i class="fa fa-file-pdf-o f-18"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                <div class="row">
                                    <div class="list-product list-category">
                                        <table class="table" id="tabla-boletas">
                                            <thead>
                                                <tr>
                                                    <th> <span class="f-light f-w-600">Fecha</span></th>
                                                    <th> <span class="f-light f-w-600">comprobante</span></th>
                                                    <th> <span class="f-light f-w-600">Cliente</span></th>
                                                    <th> <span class="f-light f-w-600">Total</span></th>
                                                    <th> <span class="f-light f-w-600">Acciones</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($boletas as $key => $boleta) : ?>
                                                    <tr class="product-removes">
                                                        <td>
                                                            <p class="f-light"><?= $boleta->fecha_hora ?></p>
                                                        </td>
                                                        <td>
                                                            <div class="product-names">
                                                                <p><?= $boleta->serie_comprobante . " - " . $boleta->num_comprobante   ?></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="f-light"><?= $boleta->nombreCliente ?></p>
                                                        </td>
                                                        <td> <span class="badge badge-light-primary"><?= "S/ " . $boleta->total_venta ?></span></td>
                                                        <td>
                                                            <a href="comprobantes/<?= $boleta->serie_comprobante . "-" . $boleta->num_comprobante . ".pdf" ?>" target="_blank" class="btn btn-danger btn-hover-effect"><i class="fa fa-file-pdf-o f-18"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                <div class="row">
                                    <div class="list-product list-category">
                                        <table class="table" id="tabla-nota-ventas">
                                            <thead>
                                                <tr>
                                                    <th> <span class="f-light f-w-600">Fecha</span></th>
                                                    <th> <span class="f-light f-w-600">comprobante</span></th>
                                                    <th> <span class="f-light f-w-600">Cliente</span></th>
                                                    <th> <span class="f-light f-w-600">Total</span></th>
                                                    <th> <span class="f-light f-w-600">Acciones</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nota_ventas as $key => $n) : ?>
                                                    <tr class="product-removes">
                                                        <td>
                                                            <p class="f-light"><?= $n->fecha_hora ?></p>
                                                        </td>
                                                        <td>
                                                            <div class="product-names">
                                                                <p><?= $n->serie_comprobante . " - " . $n->num_comprobante   ?></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="f-light"><?= $n->nombreCliente ?></p>
                                                        </td>
                                                        <td> <span class="badge badge-light-primary"><?= "S/ " . $n->total_venta ?></span></td>
                                                        <td>
                                                            <a href="comprobantes/<?= $n->serie_comprobante . "-" . $n->num_comprobante . ".pdf" ?>" target="_blank" class="btn btn-danger btn-hover-effect"><i class="fa fa-file-pdf-o f-18"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
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
</div>
<!-- Container-fluid Ends-->
</div>