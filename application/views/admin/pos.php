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
                                <li class="breadcrumb-item"><a href="index.html">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg></a></li>
                                <li class="breadcrumb-item">Dashboard</li>
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
                                                <h5>Our Product</h5>
                                                <p class="f-m-light mt-1 text-gray f-w-500">Browse & Discover Thousands of products here!</p>
                                            </div>
                                            <div class="product-body">
                                                <div class="input-group product-search"><span class="input-group-text"><i class="search-icon text-gray" data-feather="search"></i></span>
                                                    <input class="form-control" type="text" placeholder="Buscar aqui.." list="datalistOptionssearch" id="p-search">
                                                    <datalist id="datalistOptionssearch">
                                                    </datalist>
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
                                            <h5 class="m-0">Customer </h5>
                                            <div class="card-header-right-icon create-right-btn"><a class="btn btn-light-primary f-w-500 f-12" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#dashboard8">Create +</a></div>
                                            <!-- Modal-->
                                            <div class="modal fade" id="dashboard8" tabindex="-1" aria-labelledby="dashboard8" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modaldashboard">Create Customer</h5>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="text-start dark-sign-up">
                                                                <div class="modal-body">
                                                                    <form class="row g-3 needs-validation" novalidate="">
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" for="validationCustom-8">First Name<span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="validationCustom-8" type="text" placeholder="Enter your first-name" required="">
                                                                            <div class="valid-feedback">Looks good!</div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" for="validationCustom09">Last Name<span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="validationCustom09" type="text" placeholder="Enter your last-name" required="">
                                                                            <div class="valid-feedback">Looks good!</div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" for="validationCustom08">Mobile Number<span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="validationCustom08" type="number" placeholder="Mobile number" required="">
                                                                            <div class="valid-feedback">Looks good!</div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput8">Email<span class="txt-danger">*</span></label>
                                                                                <input class="form-control" id="exampleFormControlInput8" type="email" placeholder="customername@gmail.com">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 d-flex justify-content-end">
                                                                            <button class="btn btn-primary" type="submit">Create +</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 order-details">
                                        <select class="form-select f-w-400 f-14 text-gray py-2" aria-label="Select Customer">
                                            <option selected="" disabled="">Select Customer</option>
                                            <option value="1">Brooklyn Simmons</option>
                                            <option value="2">Savannah Nguyen</option>
                                            <option value="3">Esther </option>
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
                                            <div class="item-number pt-3 pb-0"><span class="f-w-500">Total</span>
                                                <h6 class="txt-primary" id="total-price">S/. 00.00</h6>
                                            </div>
                                        </div>
                                        <h5 class="m-0 p-t-40">Medio de Pago</h5>
                                        <div class="payment-methods">
                                            <div>
                                                <div class="bg-payment widget-hover"> <img src="<?= base_url() ?>assets/images/dashboard-8/payment-option/cash.svg" alt="cash"></div><span class="f-w-500 text-gray">Cash</span>
                                            </div>
                                            <div>
                                                <div class="bg-payment widget-hover"> <img src="<?= base_url() ?>assets/images/dashboard-8/payment-option/card.svg" alt="card"></div><span class="f-w-500 text-gray">Card</span>
                                            </div>
                                            <div>
                                                <div class="bg-payment widget-hover"> <img src="<?= base_url() ?>assets/images/dashboard-8/payment-option/wallet.svg" alt="wallet"></div><span class="f-w-500 text-gray">E-Wallet</span>
                                            </div>
                                        </div>
                                        <div class="place-order">
                                            <button class="btn btn-primary btn-hover-effect w-100 f-w-500" type="button">Realizar Venta</button>
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