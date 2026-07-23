<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Citas</title>

    <?php echo view('heads'); ?>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/dashboard.css">

</head>
<body class="n-body">
<div id="loader" class="conteneur_general_load_9 visible h-100 w-100">
    <div class="loader_9"></div>
</div>

<?php echo view('admin/admin-header'); ?>

<div class="container-fluid ">
    <div class="row d-flex align-items-center justify-content-center">
        <main class="col-12 col-lg-10 p-0 ">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Citas Médicas</h1>
                <div class="btn-toolbar mb-2 mb-md-0 col-12 col-md-3 col-xl-2">
                    <!-- Button trigger modal -->
                    <button id="btnModalNuevaCita" type="button" class="btn btn-primary rounded-pill w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#modalNuevaCita">
                        Agregar Cita Médica
                        <i class="fa fa-add"></i>
                    </button>
                </div>
            </div>

            <div class="row my-0 mx-3 border bg-light pt-4 table-container rounded-2 n-box n-border n-body h-auto">
                <div class="row mb-5 col-12 col-md-4">
                    <label for="srcRolEdit" class="col-sm-2 col-form-label font"><h5>Usuario</h5></label>
                    <div class="col-sm-10">
                        <select id="srcUsuario" class="form-select">
                            <option value="" disabled="disabled" selected>Seleccione Uno</option>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <option value=" <?php echo $usuario['id'] ?>"><?php echo $usuario['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row col-12 mb-5">
                    <div id='calendar'></div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalNuevaCita" tabindex="-1" aria-labelledby="modalNuevaCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border ">
            <div class="modal-header text-white">

                <h5 class="modal-title n-color" id="modalNuevaCitaLabel">Agregar Nueva Cita Médica</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formCita" action="<?php echo site_url('AdminCitas/addCita'); ?>" method="post">
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
                            <label for="inputRut" class="n-color">RUT</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control" id="inputRut">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFono" class="n-color">Teléfono</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control" id="inputFono">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputEdad" class="n-color">Edad</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="number" class="form-control" id="inputEdad">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputSexo" class="n-color">Sexo</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <select id="inputSexo" class="form-select" aria-label="Default select example">
                                    <option value="" disabled="disabled" selected>Seleccione...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputDireccion" class="n-color">Dirección</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="text" class="form-control" id="inputDireccion">
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="my-4 d-flex flex-row flex-wrap px-0 px-md-2">
                        <legend>Datos de Consulta</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
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

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFecha" class="n-color">Hora
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="time" class="form-control datepicker" id="inputHora" required>
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

                        <div class="col-12 d-flex flex-column flex-md-row">
                            <div class="col-12 col-md-2 my-2 px-4">
                                <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <input class="form-check-input" type="checkbox" role="switch"
                                   id="inputPago">
                        </span>
                                    <label for="inputPago" class="n-color form-control text-center">Pago</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-2 my-2 px-4">
                                <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <input class="form-check-input" type="checkbox" role="switch"
                                   id="inputBoleta">
                        </span>
                                    <label for="inputBoleta" class="n-color form-control text-center">Boleta</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputMonto" class="n-color">Monto</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="number" class="form-control" id="inputMonto">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardar" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEditCita" tabindex="-1" aria-labelledby="modalEditCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalEditCitaLabel">Modificar Cita Médica</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formEditCita" action="<?php echo site_url('AdminCitas/editCita'); ?>" method="post">
                <div class="modal-body">

                    <fieldset class="my-4 d-flex flex-row flex-wrap">
                        <legend>Datos del paciente</legend>

                        <input type="hidden" id="hdnIdCita" value="">

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditNombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEditNombre" required disabled>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditRut" class="col-sm-2 col-form-label">RUT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEditRut" required disabled>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditEdad" class="col-sm-2 col-form-label">Edad</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEditEdad" required disabled>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditSexo" class="col-sm-2 col-form-label">Sexo</label>
                            <div class="col-sm-10">
                                <select id="inputEditSexo" class="form-select" aria-label="Default select example"
                                        required disabled>
                                    <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditDireccion" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEditDireccion" required disabled>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="my-4 d-flex flex-row flex-wrap">
                        <legend>Datos de Consulta</legend>

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditFecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control " id="inputEditFecha" required disabled>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                            <label for="inputEditHora" class="col-sm-2 col-form-label">Hora</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="inputEditHora" required disabled>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4 d-flex flex-column">
                            <label for="inputEditObservacion" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-11">
                                    <textarea class="form-control" name="inputObs" id="inputEditObservacion" cols="30"
                                              rows="10" required disabled></textarea>
                                <div class="invalid-feedback">
                                    Este campo es obligatorio.
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnEliminarModal" type="button" class="btn btn-danger rounded-pill">Eliminar</button>
                    <button id="btnEditarGuardar" type="button" class="btn btn-success rounded-pill d-none">Guardar
                    </button>
                    <button id="btnEditarActivar" type="button" class="btn btn-primary rounded-pill">Modificar</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalElimCita" tabindex="-1" aria-labelledby="modalElimCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg text-white">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title" id="modalElimCitaLabel">Eliminar Cita Médica</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h4>¿Esta Seguro que desea Eliminar esta Cita Médica?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="btnEliminar" type="button" class="btn btn-outline-light">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script type="text/javascript" src='<?php echo base_url() ?>/assets/calendar/index.global.js'></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/admin-citas.js"></script>

</body>
</html>