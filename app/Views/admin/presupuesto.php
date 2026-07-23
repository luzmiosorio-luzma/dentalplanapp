<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Presupuestos</title>

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

<div class="container-fluid ">
    <div class="row d-flex align-items-center justify-content-center ">
        <main class="col-12 col-lg-10 p-0 ">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Administrar Presupuestos</h1>

            </div>

            <div class="row my-0 mx-2 mx-md-5 border pt-5 rounded-2 n-box pb-4">

                <div class="btn-toolbar mb-3  col-12 d-flex flex-column flex-md-row justify-content-between ">

                    <div class="input-group d-flex flex-row align-items-center justify-content-between diario-toolbar px-2 px-xl-0">
                    </div>

                    <div class="input-group d-flex flex-row align-items-center justify-content-between diario-toolbar px-2 px-xl-0">
                        <select id="srcUser" class="form-select" aria-label="Default select example" required>
                            <option value="" disabled="disabled" selected>Seleccione Uno</option>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <option class="sel_option"
                                        value="<?php echo $usuario['id'] ?>"><?php echo $usuario['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="button" class="btn btn-secondary btn-combine" id="btnAddPresupuesto">
                            Agregar Presupuesto
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>

                </div>

                <form id="formGetPresupuesto"
                      action="<?php echo site_url('AdminPresupuesto/obtieneUserPresupuestos'); ?>"></form>
                <table id="table_presupuesto" class="display w-100">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th class="col-10">Paciente</th>
                        <th class="col-2">Fecha</th>
                    </tr>
                    </thead>
                </table>
                <div class="container-fluid d-flex justify-content-start mt-3 mb-4">
                    <button id="btnMore" class="btn btn-secondary d-none rounded-pill btn-float">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>


<!-- Modal Presupuesto-->
<div class="modal fade" id="modalPresupuesto" tabindex="-1" aria-labelledby="modalPresupuestoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPresupuestoLabel">Crear Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formPresupuesto" action="<?php echo site_url('AdminPresupuesto/addPresupuesto'); ?>"
                  method="post">

                <div class="modal-body">

                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputNombre" class="n-color">Nombre
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control form-control-sm" id="inputNombre" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFono" class="n-color">Fono</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control form-control-sm" id="inputFono">
                            </div>
                        </div>

                        <div class="col-12 my-2 px-4">
                            <label for="inputCorreo" class="n-color">Correo</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="email" class="form-control form-control-sm" id="inputCorreo">
                            </div>
                        </div>

                    </fieldset>

                    <div class="container-fluid w-100 d-flex justify-content-end my-3">

                        <button id="btnModalItem" type="button" class="btn btn-secondary btn-combine">
                            Agregar Item
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>

                    <table id="table_items" class="display w-100"></table>

                    <div class="container-fluid w-100 d-flex flex-column flex-md-row justify-content-end">
                        <button id="btnEditItem" type="button" class="btn btn-secondary btn-combine d-none mx-2">
                            Modificar Item
                            <i class="fa fa-pen ms-2"></i>
                        </button>

                        <button id="btnBorrarItem" type="button" class="btn btn-secondary btn-combine d-none mx-2">
                            Eliminar Item
                            <i class="fa fa-times ms-2"></i>
                        </button>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputSubtotal" class="n-color">Subtotal</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" disabled class="form-control form-control-sm" id="inputSubtotal" value="0">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputDescuento" class="n-color">Descuento</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" class="form-control form-control-sm" id="inputDescuento" value="0">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputTotal" class="n-color">Total</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" disabled class="form-control form-control-sm" id="inputTotal"  value="0">
                        </div>
                    </div>

                </div>

                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarPresupuesto" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Presupuesto-->
<div class="modal fade" id="modalPresupuestoEdit" tabindex="-1" aria-labelledby="modalPresupuestoEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPresupuestoEditLabel">Detalle Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formPresupuesto" action="<?php echo site_url('AdminPresupuesto/addPresupuesto'); ?>"
                  method="post">

                <div class="modal-body">

                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputNombreEdit" class="n-color">Nombre
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control form-control-sm" id="inputNombreEdit" required disabled>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFonoEdit" class="n-color">Fono</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control form-control-sm" id="inputFonoEdit" disabled>
                            </div>
                        </div>

                        <div class="col-12 my-2 px-4">
                            <label for="inputCorreoEdit" class="n-color">Correo</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="email" class="form-control form-control-sm" id="inputCorreoEdit" disabled>
                            </div>
                        </div>

                    </fieldset>


                    <table id="table_items_edit" class="display w-100"></table>

                    <div class="container-fluid w-100 d-flex flex-column flex-md-row justify-content-end">
                        <button id="btnEditItem" type="button" class="btn btn-secondary btn-combine d-none mx-2">
                            Modificar Item
                            <i class="fa fa-pen ms-2"></i>
                        </button>

                        <button id="btnBorrarItem" type="button" class="btn btn-secondary btn-combine d-none mx-2">
                            Eliminar Item
                            <i class="fa fa-times ms-2"></i>
                        </button>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputSubtotalEdit" class="n-color">Subtotal</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" disabled class="form-control form-control-sm" id="inputSubtotalEdit" value="0">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputDescuentoEdit" class="n-color">Descuento</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" disabled class="form-control form-control-sm" id="inputDescuentoEdit" value="0">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputTotalEdit" class="n-color">Total</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" disabled class="form-control form-control-sm" id="inputTotalEdit"  value="0">
                        </div>
                    </div>

                </div>

                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarPresupuesto" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Item Presupuesto-->
<div class="modal fade" id="modalItem" tabindex="-1" aria-labelledby="modalItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalItemLabel">Agregar Item al Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formItemPresupuesto">
                    <div class="col-12 my-2 px-4">
                        <label for="inputDescripcion" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputDescripcion" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDiente" class="n-color">Diente
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputDiente" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputObservacion" class="n-color">Observación</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea class="form-control h-auto" name="inputObs" id="inputObservacion"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputValor" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputValor" value="0" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDesarrollo" class="n-color">Desarrollo Tratamiento</label>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                            <select id="inputDesarrollo" class="form-select" aria-label="Default select example">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Terminado">Terminado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputEstado" class="n-color">Estado Pago</label>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                            <select id="inputEstado" class="form-select" aria-label="Default select example">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Pagado">Pagado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputFecha" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="date" class="form-control datepicker" id="inputFecha" required>
                        </div>
                    </div>

                </form>

            </div>

            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                <button id="btnAgregarItem" type="button" class="btn btn-secondary rounded-pill">Agregar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Item Presupuesto-->
<div class="modal fade" id="modalItemEdit" tabindex="-1" aria-labelledby="modalItemEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalItemEditLabel">Modificar Item de Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formItemPresupuestoEdit">
                    <div class="col-12 my-2 px-4">
                        <label for="inputDescripcionEdit" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputDescripcionEdit" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDienteEdit" class="n-color">Diente
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputDienteEdit" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputObservacionEdit" class="n-color">Observación</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea class="form-control h-auto" name="inputObs" id="inputObservacionEdit"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputValorEdit" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputValorEdit" value="0" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDesarrolloEdit" class="n-color">Desarrollo Tratamiento</label>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                            <select id="inputDesarrolloEdit" class="form-select" aria-label="Default select example">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Terminado">Terminado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputEstadoEdit" class="n-color">Estado Pago</label>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                            <select id="inputEstadoEdit" class="form-select" aria-label="Default select example">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Pagado">Pagado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputFechaEdit" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="date" class="form-control datepicker" id="inputFechaEdit" required>
                        </div>
                    </div>

                </form>

            </div>

            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                <button id="btnGuardarItem" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
            </div>
        </div>
    </div>
</div>


<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/admin-presupuesto.js"></script>
</body>
</html>