<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Novedades</title>

    <?php echo view('heads'); ?>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/dashboard.css">

</head>
<body class="n-body">
<div id="loader" class="conteneur_general_load_9 visible">
    <div class="loader_9"></div>
</div>

<?php echo view('admin/admin-header'); ?>
<input type="hidden" id="baseUrl" value="<?= base_url() ?>">
<div class="container-fluid ">
    <div class="row d-flex align-items-center justify-content-center">
        <main class="col-12 col-lg-10 p-0 ">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Administrar Novedades </h1>
            </div>
            <div class="row my-0 mx-2 mx-md-5 border pt-5 rounded-2 n-box">
                <form id="formGetUsuarios"></form>

                <div class="col-12 d-flex flex-column flex-sm-row">

                    <button id="btnAddNovedad" type="button" class="btn btn-sm btn-primary rounded-pill py-0">
                        Agregar Novedad
                        <i class="fa fa-add flex-center ms-2"></i>
                    </button>

                    <button id="btnEditNovedad" type="button"
                            class="btn btn-sm btn-primary rounded-pill py-0 ms-2 disabled">
                        Modificar Novedad
                        <i class="fa fa-edit flex-center ms-2"></i>
                    </button>
                </div>

                <table id="table_novedades" class="display w-100">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Fecha Expiración</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Modal Add Novedad-->
<div class="modal fade" id="modalAddNovedad" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAddNovedadLabel">Agregar Novedad</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="formAddNovedad">
                    <div class="col-12  my-2 px-4">
                        <label for="inputTitulo" class="n-color">Titulo
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label class="input-group-text form-linear" for="inputTitulo">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" class="form-control form-linear flex-grow-1" id="inputTitulo" required>
                        </div>
                    </div>
                    <div class="col-12  my-2 px-4">
                        <label for="inputImagen" class="n-color">Imagen
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputImagen" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <div class="form-control form-linear flex-grow-1 p-0 unbordered">
                                <input type="file" class="form-control form-linear flex-grow-1 border-right"
                                       id="inputImagen" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputFecha" class="n-color">Fecha Expiración</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text form-linear" for="inputFecha">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input onfocus="'showPicker' in this && this.showPicker()" type="date" id="inputFecha"
                                   class="form-control form-linear flex-grow-1 border-right datepicker">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                </button>
                <button id="btnGuardarNovedad" type="button" class="btn btn-sm btn-secondary rounded-pill">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Novedad-->
<div class="modal fade" id="modalEditNovedad" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalEditNovedadLabel">Modificar Novedad</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="#" id="formEditNovedad">
                    <div class="col-12  my-2 px-4">
                        <label for="inputEditTitulo" class="n-color">Titulo
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label class="input-group-text form-linear" for="inputEditTitulo">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" class="form-control form-linear flex-grow-1" id="inputEditTitulo"
                                   required>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputEditImagen" class="n-color">Imagen
                            <a href="#" id="logo_enlace" target="_blank"> (Ver Logo)</a>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputEditImagen" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <div class="form-control form-linear flex-grow-1 p-0 unbordered">
                                <input type="file" class="form-control form-linear flex-grow-1 border-right"
                                       id="inputEditImagen">
                            </div>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputEditEstado" class="n-color">Estado
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputNacionalidad" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <select id="inputEditEstado" class="form-select form-linear">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputEditFecha" class="n-color">Fecha Expiración</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text form-linear" for="inputEditFecha">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input onfocus="'showPicker' in this && this.showPicker()" type="date" id="inputEditFecha"
                                   class="form-control form-linear flex-grow-1 border-right datepicker">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                </button>
                <button id="btnGuardarEditNovedad" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
            </div>
        </div>
    </div>
</div>

<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/admin-novedades.js"></script>
</body>
</html>