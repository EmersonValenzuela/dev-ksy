        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>POS</h4>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg></a></li>
                                <li class="breadcrumb-item active">POS</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-9 col-xl-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header card-no-border">
                                        <div class="main-product-wrapper">
                                            <div class="product-header">
                                                <h5>Nuestro producto</h5>
                                                <p class="f-m-light mt-1 text-gray f-w-500">¡Explore y descubra miles de productos aquí!</p>
                                            </div>
                                            <div class="product-body">
                                                <div class="input-group product-search"><span class="input-group-text"><i class="search-icon text-gray" data-feather="search"></i></span>
                                                    <input class="form-control" type="text" placeholder="Buscar aqui.." id="p-search">
                                                </div>
                                                <div class="input-group product-search">
                                                    <span class="input-group-text"><i data-feather="folder-plus"></i></span>
                                                    <input class="form-control" type="text" placeholder="Buscar Categorias.." list="data-categories" id="p-categories">
                                                    <datalist id="data-categories">
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body main-our-product">
                                        <div class="row g-3 scroll-product">
                                            <!----------- ##AQUI SE PINTAN LOS PRODCUTOS DE LA FUNCION LOADPRODUCTS() ------------------>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-4 customer-sidebar-left">
                        <div class="md-sidebar h-100"><a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">Order Details</a>
                            <div class="md-sidebar-aside custom-scrollbar responsive-order-details">
                                <div class="card customer-sticky">
                                    <div class="card-header card-no-border pb-3">
                                        <div class="header-top border-bottom pb-3">
                                            <h5 class="m-0">Cliente </h5>
                                            <div class="card-header-right-icon create-right-btn"><a class="btn btn-light-primary f-w-500 f-12" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#dashboard8">Crear +</a></div>

                                        </div>
                                    </div>
                                    <div class="card-body pt-0 order-details">
                                        <select class="form-select f-w-400 f-14 text-gray py-2" aria-label="Select Customer" id="select-customer">
                                            <option selected="" disabled="">Selecciona Cliente</option>

                                        </select> <br>
                                        <select class="form-select f-w-400 f-14 text-gray py-2" aria-label="Select Customer" id="select-method">
                                            <option selected="" disabled="">Tipo de Comprobante</option>
                                            <option value="B">Boleta</option>
                                            <option value="F">Factura</option>
                                            <option value="N">Nota Venta</option>
                                        </select>
                                        <h5 class="m-0">Detalles de la Venta</h5>
                                        <div class="order-quantity p-b-20 border-bottom">
                                            <div class="card-body p-0 trash-items">
                                                <div class="empty-cart-wrapper">
                                                    <div class="empty-cart-content"><img src="<?= base_url() ?>assets/images/dashboard-8/order-trash.gif" alt="order-trash"></div>
                                                    <h6 class="text-gray">Venta Vacia!!!</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total-item">
                                            <div class="item-number pt-3 pb-0">
                                                <span class="f-w-500">Total</span>
                                                <h6 class="txt-primary" id="total-price">S/. 00.00</h6>
                                            </div> <br>
                                            <div class="item-number border-bottom">
                                                <span class="text-gray">Medio Pago</span><span class="f-w-500" id="method-payment" data-value=""> - - - - </span>
                                            </div>
                                        </div>
                                        <h5 class="m-0 p-t-40">Medio de Pago</h5>
                                        <div class="payment-methods">
                                            <div>
                                                <div class="bg-payment widget-hover" data-method="cash" data-name="Efectivo"> <img src="<?= base_url() ?>assets/images/dashboard-8/payment-option/cash.svg" alt="cash"></div><span class="f-w-500 text-gray">Efectivo</span>
                                            </div>
                                            <div>
                                                <div class="bg-payment widget-hover" data-method="card" data-name="Tarjeta"> <img src="<?= base_url() ?>assets/images/dashboard-8/payment-option/card.svg" alt="card"></div><span class="f-w-500 text-gray">tarjeta</span>
                                            </div>
                                            <div>
                                                <div class="bg-payment widget-hover" data-method="wallet" data-name="E-Billetera"> <img src="<?= base_url() ?>assets/images/dashboard-8/payment-option/wallet.svg" alt="wallet"></div><span class="f-w-500 text-gray">Billetera virtual</span>
                                            </div>
                                        </div>
                                        <div class="place-order">
                                            <button class="btn btn-primary btn-hover-effect w-100 f-w-500" type="button" id="go-payment">Realizar Venta</button>
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

        <!-- Modal-->
        <div class="modal fade" tabindex="-1" role="dialog" id="dashboard8" aria-hidden="true">
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
                                                <option value="RUC">RUC</option>
                                                </option>
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
                                    <button class="btn btn-info" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Cliente</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>