              <!-- Page Sidebar Ends-->
              <!--diseño de la tabla-->
              <div class="page-body">
                  <div class="container-fluid">
                      <div class="page-title">
                          <div class="row">
                              <div class="col-6">
                                  <h4>Articulos</h4>
                              </div>
                              <div class="col-6">
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="index.html">
                                              <svg class="stroke-icon">
                                                  <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                              </svg></a></li>
                                      <li class="breadcrumb-item">Dashboard</li>
                                      <li class="breadcrumb-item active">Articulos</li>
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
                                                  <i class="fa fa-plus"></i> Agregar Articulos
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table class="display" id="data-articulo">
                                              <thead class="text-center">
                                                  <tr>
                                                  </tr>
                                                  <tr>
                                                      <th>Codigo</th>
                                                      <th>Nombre</th>
                                                      <th>Categoria</th>
                                                      <th>Stock</th>
                                                      <th>Condicion</th>
                                                      <th>Acciones</th>
                                              </thead>
                                              <tfoot class="text-center">
                                                  <tr>
                                                      <th>Codigo</th>
                                                      <th>Nombre</th>
                                                      <th>Categoria</th>
                                                      <th>Stock</th>
                                                      <th>Condicion</th>
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
                  <div class="modal-dialog modal-xl modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="id_title"></h4>
                              <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="container-fluid">
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="card">
                                              <div class="card-body">
                                                  <div class="row g-xl-5 g-3">
                                                      <div class="col-xxl-3 col-xl-4 box-col-4e sidebar-left-wrapper">
                                                          <ul class="sidebar-left-icons nav nav-pills" id="add-product-pills-tab" role="tablist">
                                                              <li class="nav-item"> <a class="nav-link active" id="detail-product-tab" data-bs-toggle="pill" href="#detail-product" role="tab" aria-controls="detail-product" aria-selected="false">
                                                                      <div class="nav-rounded">
                                                                          <div class="product-icons">
                                                                              <svg class="stroke-icon">
                                                                                  <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#product-detail"></use>
                                                                              </svg>
                                                                          </div>
                                                                      </div>
                                                                      <div class="product-tab-content">
                                                                          <h6>Agredar Detalle de Producto</h6>
                                                                          <p>Agregar nombre y detalle de Producto</p>
                                                                      </div>
                                                                  </a></li>
                                                              <li class="nav-item"> <a class="nav-link" id="gallery-product-tab" data-bs-toggle="pill" href="#gallery-product" role="tab" aria-controls="gallery-product" aria-selected="false">
                                                                      <div class="nav-rounded">
                                                                          <div class="product-icons">
                                                                              <svg class="stroke-icon">
                                                                                  <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#product-gallery"></use>
                                                                              </svg>
                                                                          </div>
                                                                      </div>
                                                                      <div class="product-tab-content">
                                                                          <h6>Galeria Producto</h6>
                                                                          <p>thumbnail & Add Product Gallery</p>
                                                                      </div>
                                                                  </a></li>
                                                              <li class="nav-item"> <a class="nav-link" id="category-product-tab" data-bs-toggle="pill" href="#category-product" role="tab" aria-controls="category-product" aria-selected="false">
                                                                      <div class="nav-rounded">
                                                                          <div class="product-icons">
                                                                              <svg class="stroke-icon">
                                                                                  <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#product-category"></use>
                                                                              </svg>
                                                                          </div>
                                                                      </div>
                                                                      <div class="product-tab-content">
                                                                          <h6>Categorias de Prodcuto</h6>
                                                                          <p>Agregar Categoria del producto, Estado y Etiquetas</p>
                                                                      </div>
                                                                  </a></li>
                                                              <li class="nav-item"><a class="nav-link" id="pricings-tab" data-bs-toggle="pill" href="#pricings" role="tab" aria-controls="pricings" aria-selected="false">
                                                                      <div class="nav-rounded">
                                                                          <div class="product-icons">
                                                                              <svg class="stroke-icon">
                                                                                  <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#pricing"> </use>
                                                                              </svg>
                                                                          </div>
                                                                      </div>
                                                                      <div class="product-tab-content">
                                                                          <h6>Precios de venta</h6>
                                                                          <p>Agregar precio básico del producto y descuento</p>
                                                                      </div>
                                                                  </a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                      <div class="col-xxl-9 col-xl-8 box-col-8 position-relative">
                                                          <div class="tab-content" id="add-product-pills-tabContent">
                                                              <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                                                                  <div class="sidebar-body">
                                                                      <form class="row g-2">    
                                                                          <div class="col-6 custom-input">
                                                                              <label class="form-label col-12 m-0" for="productTitle1">Titulo del producto<span class="txt-danger"> *</span></label>
                                                                              <input class="form-control" id="productTitle1" name=" pdttitulo" type="text" required="">
                                                                              <div class="valid-feedback">Looks good!</div>
                                                                              <div class="invalid-feedback">Se requiere y se recomienda que un nombre de producto sea único.</div>
                                                                          </div>
                                                                          <div class="col-4 custom-input">
                                                                              <label class="form-label col-12 m-0" for="productCode">Codigo del producto<span class="txt-danger"> *</span></label>
                                                                              <input class="form-control" id="productCode" name=" pdtcode" type="text" required="">
                                                                          </div>
                                                                          <div class="col-12">
                                                                              <div class="toolbar-box">
                                                                                  <div id="toolbar2"><span class="ql-formats">
                                                                                          <select class="ql-size"></select></span><span class="ql-formats">
                                                                                          <button class="ql-bold">Bold </button>
                                                                                          <button class="ql-italic">Italic </button>
                                                                                          <button class="ql-underline">underline</button>
                                                                                          <button class="ql-strike">Strike </button></span><span class="ql-formats">
                                                                                          <button class="ql-list" value="ordered">List </button>
                                                                                          <button class="ql-list" value="bullet"> </button>
                                                                                          <button class="ql-indent" value="-1"> </button>
                                                                                          <button class="ql-indent" value="+1"></button></span><span class="ql-formats">
                                                                                          <button class="ql-link"></button>
                                                                                          <button class="ql-image"></button>
                                                                                          <button class="ql-video"></button></span></div>
                                                                                  <div id="editor2"></div>
                                                                              </div>
                                                                              <p class="f-light">Mejore la visibilidad del producto agregando una descripción convincente.</p>
                                                                          </div>
                                                                      </form>

                                                                  </div>
                                                              </div>
                                                              <div class="tab-pane fade" id="gallery-product" role="tabpanel" aria-labelledby="gallery-product-tab">
                                                                  <div class="sidebar-body">
                                                                      <div class="product-upload">
                                                                          <p>Imagen del producto</p>
                                                                          <form class="dropzone dropzone-light" id="multiFileUploadA" action="/upload.php" name="prdImage">
                                                                              <div class="dz-message needsclick">
                                                                                  <svg>
                                                                                      <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#file-upload"></use>
                                                                                  </svg>
                                                                                  <h6>Arrastra tu imagen aquí, o<a class="txt-primary" href="#!">browser</a></h6><span class="note needsclick">SVG,PNG,JPG or GIF</span>
                                                                              </div>
                                                                          </form>
                                                                      </div>
                                                                      <div class="product-upload">
                                                                          <p>Galería de productos</p>
                                                                          <form class="dropzone dropzone-light" id="multiFileUploadB" action="/upload.php" name="prdGallery">
                                                                              <div class="dz-message needsclick">
                                                                                  <svg>
                                                                                      <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#file-upload1"></use>
                                                                                  </svg>
                                                                                  <h6>Drag files here</h6><span class="note needsclick">Agregar imágenes de la galería de productos</span>
                                                                              </div>
                                                                          </form>
                                                                      </div>

                                                                  </div>
                                                              </div>
                                                              <div class="tab-pane fade" id="category-product" role="tabpanel" aria-labelledby="category-product-tab">
                                                                  <div class="sidebar-body">
                                                                      <form>
                                                                          <div class="row g-lg-4 g-3">
                                                                              <div class="col-12">
                                                                                  <div class="row g-3">
                                                                                      <div class="col-sm-6">
                                                                                          <div class="row g-2">
                                                                                              <div class="col-12">
                                                                                                  <label class="form-label m-0" for="prdCategoria">Agregar categoría</label>
                                                                                              </div>
                                                                                              <div class="col-12">
                                                                                                  <select class="form-select" id="prdCategoria" name=prdCategoria required="">
                                                                                                      <option selected="" value="">Opcional</option>
                                                                                                  </select>
                                                                                                  <p class="f-light">Se puede agregar un producto a una categoría.</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="col-sm-6">
                                                                                          <div class="row g-2 product-tag">
                                                                                              <div class="col-12">
                                                                                                  <labe l class="form-label d-block m-0">Agregar Etiquetas</label>
                                                                                              </div>
                                                                                              <div class="col-12">
                                                                                                  <input name="basic-tags" name="prdTags" value="emerson,diego">
                                                                                                  <p class="f-light">Los productos se pueden etiquetar.</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="col-12">
                                                                                          <div class="category-buton">
                                                                                              <button class="btn button-primary" id="showCategory">
                                                                                                  <i class="me-2 fa fa-plus"> </i>Crear Nueva Categoria
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-12">
                                                                                  <div class="row g-3">
                                                                                      <div class="col-sm-6">
                                                                                          <div class="row">
                                                                                              <div class="col-12">
                                                                                                  <label class="form-label" for="publishStatus">Estado de publicación</label>
                                                                                                  <select class="form-select" id="publishStatus" required="" name="prdStatus">
                                                                                                      <option selected="" value="">Publish</option>
                                                                                                      <option>Borradores</option>
                                                                                                      <option>Despublicar</option>
                                                                                                  </select>
                                                                                                  <p class="f-light">Elige el estado</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                              <div class="tab-pane fade" id="pricings" role="tabpanel" aria-labelledby="pricings-tab">
                                                                  <div class="sidebar-body">
                                                                      <form class="price-wrapper">
                                                                          <div class="row g-3 custom-input">
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label" for="initialCost">Costo inicial<span class="txt-danger">*</span></label>
                                                                                  <input class="form-control" id="initialCost" type="number" name="prdInitialCost">
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label" for="sellingPrice">Precio de venta <span class="txt-danger">*</span></label>
                                                                                  <input class="form-control" id="sellingPrice" type="number" name="prdSelling">
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label">Elige tu moneda</label>
                                                                                  <select class="form-select" aria-label="Default select example" name="prdChoose">
                                                                                      <option selected="">Dollar $</option>
                                                                                      <option value="1">Euro €</option>
                                                                                      <option value="2">Rupees ₹</option>
                                                                                      <option value="3">British pounds £</option>
                                                                                      <option value="4">Russian Ruble ₽</option>
                                                                                      <option value="5">Japanese Yen ¥</option>
                                                                                      <option value="6">Singapore Dollar S$</option>
                                                                                  </select>
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label" for="productStock1">Existencias de productos<span class="txt-danger">*</span></label>
                                                                                  <input class="form-control" id="productStock1" type="number" name="prdStock">
                                                                              </div>
                                                                          </div>
                                                                          <div class="product-buttons">
                                                                              <div class="btn bg-success">
                                                                                  <div class="d-flex align-items-center gap-sm-2 gap-1">Guardar
                                                                                      <svg>
                                                                                          <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#front-arrow"></use>
                                                                                      </svg>
                                                                                  </div>
                                                                              </div>
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
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>



              <div class="modal fade" tabindex="-1" role="dialog" id="mdl_addCategory" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="id_title"></h4>
                              <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form class="form-bookmark theme-form" id="frm_category">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label class="form-label" for="names_c">Nombres</label>
                                                  <input class="form-control input-air-primary" id="names_c" name="names_c" type="text" placeholder="Ejem. Nombre de Categoria" autofocus>
                                                  <input class="form-control input-air-primary" id="id_category" name="id_category" type="hidden" placeholder="Ejem. Nombre de Categoria" autofocus>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label class="form-label" for="description">Descripcion</label>
                                                  <input class="form-control input-air-primary" id="description" type="text" placeholder="Ejem. tres" name="description">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                              <div class="mb-3">
                                                  <label class="form-label" for="condition">Condición</label>
                                                  <select class="form-select input-air-primary" id="condition" name="condition">
                                                      <option value="" selected disabled>Selecciona Condición</option>
                                                      <option value="1">Activo</option>
                                                      <option value="0">Inactivo</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                      </div>
                                      <div class="card-footer text-end">
                                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                          <button class="btn btn-info disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Categoria</button>
                                          <button class="btn btn-info hidden" type="submit" id="btn_edit"><i class="fa fa-edit"></i> Editar Categoria</button>

                                      </div>
                                      <div class="col-md-7">
                                          <div class="mb-3">
                                              <label class="form-label" for="description">Descripcion</label>
                                              <input class="form-control input-air-primary" id="description" type="text" placeholder="Ejem. tres" name="description">
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label class="form-label" for="image">Imagen</label>
                                                  <input class="form-control" id="formFile" type="file">
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="mb-3">
                                                  <label class="form-label" for="condition">Condición</label>
                                                  <select class="form-select input-air-primary" id="condition" name="condition">
                                                      <option value="" selected disabled>Selecciona Condición</option>
                                                      <option value="1">Activo</option>
                                                      <option value="0">Inactivo</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                      </div>
                                      <div class="card-footer text-end">
                                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                          <button class="btn btn-info disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Articulo</button>
                                          <button class="btn btn-info hidden" type="submit" id="btn_edit"><i class="fa fa-edit"></i> Editar Articulo</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>