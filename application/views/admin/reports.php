<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Reportes Control Temperatura</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard-Temperatura">
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                <h3 class="modal-header justify-content-center border-0">CUBA SIGN-UP</h3>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate="">
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">First name</label>
                            <input class="form-control" id="validationCustom01" type="text" placeholder="Enter your name" required="">
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">Last name</label>
                            <input class="form-control" id="validationCustom02" type="text" placeholder="Enter your surname" required="">
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="cubatheme@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="">
                                <label class="form-check-label d-block mb-0" for="flexCheckDefault">You accept our
                                    Terms and Privacy Policy by clicking Submit below.</label>
                            </div>
                            <button class="btn btn-primary" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>