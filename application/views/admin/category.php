                      <!-- Page Sidebar Ends-->
                      <!--diseño de la tabla-->
                      <div class="page-body">
                          <div class="container-fluid">
                              <div class="page-title">
                                  <div class="row">
                                      <div class="col-6">
                                          <h4>Categorias</h4>
                                      </div>
                                      <div class="col-6">
                                          <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a href="<?= base_url() ?>">
                                                      <svg class="stroke-icon">
                                                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                                      </svg></a></li>
                                              <li class="breadcrumb-item active">Categorias</li>
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
                                                          <i class="fa fa-plus"></i> Agregar Categoria
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                  <table class="display" id="data-categoria">
                                                      <thead class="text-center">
                                                          <tr>
                                                          </tr>
                                                          <tr>
                                                              <th>Nombre</th>
                                                              <th>Descripcion</th>
                                                              <th>Condicion</th>
                                                              <th>Acciones</th>
                                                      </thead>
                                                      <tfoot class="text-center">
                                                          <tr>
                                                              <th>Nombre</th>
                                                              <th>Descripcion</th>
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
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>