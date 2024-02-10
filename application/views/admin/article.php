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
                                      <li class="breadcrumb-item"><a href="<?= base_url() ?>">
                                              <svg class="stroke-icon">
                                                  <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                              </svg></a></li>
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
                                                          <form id="form-new-article" enctype="multipart/form-data">
                                                            <input type="hidden" name="idArticle" id="idArticle">
                                                              <div class="tab-content" id="add-product-pills-tabContent">
                                                                  <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                                                                      <div class="sidebar-body">
                                                                          <div class="row g-2">
                                                                              <div class="col-6">
                                                                                  <label class="form-label col-12 m-0" for="productCode">Codigo del producto<span class="txt-danger"> *</span></label>
                                                                                  <div class="input-group">
                                                                                      <input class="form-control" type="text" name="prdCod" id="codProduc">
                                                                                      <button class="btn btn-info" type="button" onclick="addCode()"><i class="fa fa-repeat"></i></button>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-6 custom-input">
                                                                                  <label class="form-label col-12 m-0" for="productTitle1">Titulo del producto<span class="txt-danger"> *</span></label>
                                                                                  <input class="form-control" id="productTitle1" name="prdtitulo" type="text" required="">
                                                                                  <div class="valid-feedback">Looks good!</div>
                                                                                  <div class="invalid-feedback">Se requiere y se recomienda que un nombre de producto sea único.</div>
                                                                              </div>
                                                                              <div class="col-12">
                                                                                  <textarea placeholder="Escribe descripción" class="form-control" rows="10" name="prdDescription" id="prdDescription"></textarea>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="tab-pane fade" id="gallery-product" role="tabpanel" aria-labelledby="gallery-product-tab">
                                                                      <div class="sidebar-body">
                                                                          <div class="product-upload">
                                                                              <p>Imagen del producto</p>
                                                                              <div class="card-body">
                                                                                  <input class="" type="file" id="prdImage" name="prdImage">
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="tab-pane fade" id="category-product" role="tabpanel" aria-labelledby="category-product-tab">
                                                                      <div class="sidebar-body">
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
                                                                                                  <label class="form-label d-block m-0">Agregar Etiquetas</label>
                                                                                              </div>
                                                                                              <div class="col-12">
                                                                                                  <input name="basic-tags" id="basic-tags">
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
                                                                                                      <option selected="" value="1">Activo</option>
                                                                                                      <option value="2">Inactivo</option>
                                                                                                  </select>
                                                                                                  <p class="f-light">Elige el estado</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="tab-pane fade" id="pricings" role="tabpanel" aria-labelledby="pricings-tab">
                                                                      <div class="sidebar-body">
                                                                          <div class="row g-3 custom-input">
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label" for="initialCost">Costo inicial<span class="txt-danger">*</span></label>
                                                                                  <input class="form-control input_numb" id="initialCost" type="number" name="prdInitialCost">
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label" for="sellingPrice">Precio de venta <span class="txt-danger">*</span></label>
                                                                                  <input class="form-control input_numb" id="sellingPrice" type="number" name="prdSelling">
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label">Elige tu moneda</label>
                                                                                  <select class="form-select" aria-label="Default select example" name="prdChoose" id="prdChoose">
                                                                                      <option selected="" value="$">Dollar $</option>
                                                                                      <option value="S/.">Soles S/.</option>
                                                                                      <option value="€">Euro €</option>

                                                                                  </select>
                                                                              </div>
                                                                              <div class="col-sm-6">
                                                                                  <label class="form-label" for="productStock1">Existencias de productos<span class="txt-danger">*</span></label>
                                                                                  <input class="form-control input_numb" id="productStock1" type="number" name="prdStock">
                                                                              </div>
                                                                          </div>
                                                                          <div class="product-buttons">
                                                                              <div class="btn bg-success" id="btn-new">
                                                                                  <div class="d-flex align-items-center gap-sm-2 gap-1" id="btn-new-article">
                                                                                      <i class="icon-save"></i> Guardar
                                                                                      <svg>
                                                                                          <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#front-arrow"></use>
                                                                                      </svg>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="btn bg-info hidden" id="btn-update">
                                                                                  <div class="d-flex align-items-center gap-sm-2 gap-1" id="btn-update-article">
                                                                                      <i class="icon-save"></i> Actualizar
                                                                                      <svg>
                                                                                          <use href="<?= base_url(); ?>assets/svg/icon-sprite.svg#front-arrow"></use>
                                                                                      </svg>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
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



              <div class="modal fade" tabindex="-1" role="dialog" id="mdl_addCategory" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Agregar Categoria</h4>
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
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label class="form-label" for="description">Descripcion</label>
                                                  <input class="form-control input-air-primary" id="description" type="text" placeholder="Ejem. tres" name="description">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row hidden">
                                          <div class="col-md-4">
                                              <div class="mb-3">
                                                  <label class="form-label" for="condition">Condición</label>
                                                  <select class="form-select input-air-primary" id="condition" name="condition">
                                                      <option value="1" selected>Activo</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                      </div>
                                      <div class="card-footer text-end">
                                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                          <button class="btn btn-info disabled" type="submit" id="btn_sendCategory"><i class="fa fa-save"></i> Guardar Categoria</button>
                                      </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>