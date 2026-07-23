<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Productos</title>

    <?php echo view('heads'); ?>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/dashboard.css">

</head>
<body>
<div class="h-100 w-100">

    <div id="loader" class="conteneur_general_load_9 visible h-100 w-100">
        <div class="loader_9"></div>
    </div>

    <?php echo view('admin/admin-header'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php echo view('admin/admin-sidebar'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 p-0">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-4 pb-2 px-4 mb-3 border-bottom bg-grad text-white page-board">
                    <h1 class="h2"><i class="fas fa-box pe-2"></i>Productos</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-light rounded-pill"
                                data-bs-toggle="modal"
                                data-bs-target="#modalProducto">
                            Agregar Nuevo
                            <i class="fa fa-add"></i>
                        </button>
                    </div>
                </div>
                <div class="row my-0 mx-3 border bg-light pt-4 table-container rounded-2">
                    <form id="formGetProductos" action="<?php echo site_url('AdminProductos/getProductos'); ?>"></form>
                    <table id="table_id" class="display w-100">
                        <thead>
                        <tr>
                            <th class="d-none">id</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Descripcion</th>
                            <th>Fecha Vencimiento</th>
                            <th class="d-none">idunidad</th>
                            <th>Unidad</th>
                        </tr>
                        </thead>
                    </table>
                    <div class="container-fluid d-flex justify-content-end mt-3 mb-4">
                        <button id="btnEdit" class="btn btn-warning d-none rounded-pill">Modificar Producto
                            <i class="fa fa-pen ms-1"></i>
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="modalProductoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalProductoLabel">Agregar Nuevo Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form id="formProductos" action="<?php echo site_url('AdminProductos/addProducto'); ?>" method="post">
                    <div class="modal-body d-flex flex-wrap justify-content-between">

                        <div class="row col-12 mb-3">
                            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" required>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mb-3">
                            <label for="inputCantidad" class="col-sm-2 col-form-label">Cantidad
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputCantidad" required>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mb-3 align-items-center">
                            <label for="srcUnidad" class="col-sm-2 col-form-label">Unidad
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="col-sm-10">
                                <select id="srcUnidad" class="form-select" aria-label="Default select example" required>
                                    <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                    <?php foreach ($unidades as $unidad) { ?>
                                        <option value="<?= $unidad['id'] ?>"><?= $unidad['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mb-3 d-flex flex-column flex-md-row">
                            <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="inputObs" id="inputDescripcion" cols="30"
                                          rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row col-12 mb-3 align-items-center">
                            <label for="inputFecha" class="col-sm-2 col-form-label">Fecha de Vencimiento</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputFecha">
                            </div>
                        </div>


                        <div class="row col-12 align-items-center">
                            <span class="text-danger fw-bold">Los campos marcados con (*) son obligatorios.</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                        </button>
                        <button id="btnGuardar" type="button" class="btn btn-primary rounded-pill">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Modal Edit-->
    <div class="modal fade" id="modalProductoEdit" tabindex="-1" aria-labelledby="modalProductoEditLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalProductoEditLabel">Modificar Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form id="formProductosEdit" action="<?php echo site_url('AdminProductos/editProducto'); ?>" method="post">
                    <div class="modal-body d-flex flex-wrap justify-content-between">

                        <div class="row col-12 mb-3">
                            <label for="inputNombreEdit" class="col-sm-2 col-form-label">Nombre
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombreEdit" required>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mb-3">
                            <label for="inputCantidadEdit" class="col-sm-2 col-form-label">Cantidad
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputCantidadEdit" required>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mb-3 align-items-center">
                            <label for="srcUnidadEdit" class="col-sm-2 col-form-label">Unidad
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="col-sm-10">
                                <select id="srcUnidadEdit" class="form-select" aria-label="Default select example" required>
                                    <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                    <?php foreach ($unidades as $unidad) { ?>
                                        <option value="<?= $unidad['id'] ?>"><?= $unidad['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="row col-12 mb-3 d-flex flex-column flex-md-row">
                            <label for="inputDescripcionEdit" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="inputObs" id="inputDescripcionEdit" cols="30"
                                          rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row col-12 mb-3 align-items-center">
                            <label for="inputFechaEdit" class="col-sm-2 col-form-label">Fecha de Vencimiento</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputFechaEdit">
                            </div>
                        </div>


                        <div class="row col-12 align-items-center">
                            <span class="text-danger fw-bold">Los campos marcados con (*) son obligatorios.</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                        </button>
                        <button id="btnGuardarEdit" type="button" class="btn btn-primary rounded-pill">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


                    <?php echo view('toast'); ?>
                    <?php echo view('scripts'); ?>
                    <script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
                    <script type="text/javascript"
                            src='<?php echo base_url() ?>/assets/calendar/index.global.js'></script>
                    <script type="text/javascript"
                            src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
                    <script type="text/javascript"
                            src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
                    <script type="text/javascript"
                            src="<?php echo base_url() ?>/assets/views/js/admin-productos.js"></script>
            </div>

</body>
</html>