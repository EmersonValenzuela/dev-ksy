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
                                                        <option value="Bluetooth Calling Smartwatch"></option>
                                                        <option value="Microsoft Surface Laptop"></option>
                                                        <option value="Gaming Over Ear Headphone"></option>
                                                        <option value="Apple iPhone 14 Plus"></option>
                                                        <option value="Bluetooth Calling Smartwatch"></option>
                                                        <option value="Microsoft Surface Laptop"></option>
                                                        <option value="Gaming Over Ear Headphone"></option>
                                                        <option value="Apple iPhone 14 Plus"></option>
                                                        <option value="Bluetooth Calling Smartwatch"></option>
                                                        <option value="Microsoft Surface Laptop"></option>
                                                        <option value="Gaming Over Ear Headphone"></option>
                                                        <option value="Apple iPhone 14 Plus"></option>
                                                        <option value="Bluetooth Calling Smartwatch"></option>
                                                        <option value="Microsoft Surface Laptop"></option>
                                                        <option value="Gaming Over Ear Headphone"></option>
                                                        <option value="Apple iPhone 14 Plus"></option>
                                                        <option value="Bluetooth Calling Smartwatch"></option>
                                                        <option value="Microsoft Surface Laptop"></option>
                                                        <option value="Gaming Over Ear Headphone"></option>
                                                        <option value="Apple iPhone 14 Plus"></option>
                                                        <option value="Bluetooth Calling Smartwatch"></option>
                                                        <option value="Microsoft Surface Laptop"></option>
                                                        <option value="Gaming Over Ear Headphone"></option>
                                                        <option value="Apple iPhone 14 Plus"></option>
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
                                        <h5 class="m-0">Order Details</h5>
                                        <div class="order-quantity p-b-20 border-bottom">
                                            <div class="order-details-wrapper">
                                                <div class="left-details">
                                                    <div class="order-img widget-hover"><img src="<?= base_url() ?>assets/images/dashboard-8/product-categories/phone.png" alt="phone"></div>
                                                </div>
                                                <div class="category-details">
                                                    <div class="order-details-right"><span class="text-gray mb-1">Category : <span class="font-dark">Phone</span></span>
                                                        <h6 class="f-14 f-w-500 mb-3">Apple iPhone 14 Plus</h6>
                                                        <div class="last-order-detail">
                                                            <h6 class="txt-primary">$987.00</h6><a href="javascript:void(0)"> <i class="fa fa-trash trash-remove"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="right-details">
                                                        <div class="touchspin-wrapper">
                                                            <button class="decrement-touchspin btn-touchspin"><i class="fa fa-minus text-gray"></i></button>
                                                            <input class="input-touchspin" id="inputData" type="number" value="9">
                                                            <button class="increment-touchspin btn-touchspin"><i class="fa fa-plus text-gray"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-details-wrapper">
                                                <div class="left-details">
                                                    <div class="order-img widget-hover"><img src="<?= base_url() ?>assets/images/dashboard-8/product-categories/watch-2.png" alt="watch"></div>
                                                </div>
                                                <div class="category-details">
                                                    <div class="order-details-right"><span class="text-gray mb-1">Category : <span class="font-dark">Watch</span></span>
                                                        <h6 class="f-14 f-w-500 mb-3">Bluetooth Calling Smartwatch</h6>
                                                        <div class="last-order-detail">
                                                            <h6 class="txt-primary">$109.00</h6><a href="javascript:void(0)"><i class="fa fa-trash trash-remove"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="right-details">
                                                        <div class="touchspin-wrapper">
                                                            <button class="decrement-touchspin btn-touchspin"><i class="fa fa-minus text-gray"></i></button>
                                                            <input class="input-touchspin" id="inputData1" type="number" value="9">
                                                            <button class="increment-touchspin btn-touchspin"><i class="fa fa-plus text-gray"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 empty-card trash-items">
                                                <div class="empty-cart-wrapper">
                                                    <div class="empty-cart-content"><img src="<?= base_url() ?>assets/images/dashboard-8/order-trash.gif" alt="order-trash"></div>
                                                    <h6 class="text-gray">Your cart is empty!!!</h6><a href="product.html"> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total-item">
                                            <div class="item-number"><span class="text-gray">Item</span><span class="f-w-500">3 (Items)</span></div>
                                            <div class="item-number"><span class="text-gray">Subtotal</span><span class="f-w-500">$1,186</span></div>
                                            <div class="item-number border-bottom"><span class="text-gray">Fees</span><span class="f-w-500">$20</span></div>
                                            <div class="item-number pt-3 pb-0"><span class="f-w-500">Total</span>
                                                <h6 class="txt-primary">$1,186</h6>
                                            </div>
                                        </div>
                                        <h5 class="m-0 p-t-40">Payment Method</h5>
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
                                            <button class="btn btn-primary btn-hover-effect w-100 f-w-500" type="button">Place Order</button>
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