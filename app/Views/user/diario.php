<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Diario</title>

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

<?php echo view('user/user-header'); ?>

<div class="container-fluid main-container">
    <div class="row d-flex align-items-center justify-content-center">
        <main class="col-12 p-0 ">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Citas Diarias</h1>

            </div>

            <div class="row my-0 mx-2 mx-md-5 border pt-5 rounded-2 n-box">

                <div class="btn-toolbar mb-3  col-12 d-flex flex-column flex-md-row justify-content-between ">

                    <div class="input-group d-flex flex-row align-items-center justify-content-between diario-toolbar px-2 px-xl-0">
                        <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <label for="usrFecha" class="n-color">Fecha</label>
                        </span>
                            <input type="date" class="form-control datepicker" id="usrFecha" required>
                        </div>
                    </div>

                    <div class=" d-flex flex-row align-items-center justify-content-end diario-toolbar px-2 px-xl-0">
                        <input type="hidden" id="srcUser" value="<?php echo $user_id?>">
                        <button type="button" class="btn btn-secondary btn-combine" id="btnModalAddCita">
                            Agregar Cita
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>

                </div>

                <form id="formGetCitas" action="<?php echo site_url('AdminDiario/getUserCitas'); ?>"></form>
                <table id="table_id" class="display w-100">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>Telefono</th>
                        <th>Tratamiento</th>
                        <th>Boleta</th>
                        <th>Pago</th>
                        <th>Monto</th>
                    </tr>
                    </thead>
                </table>
                <div class="container-fluid d-flex justify-content-start mt-3 mb-4">
                    <button id="btnEdit" class="btn btn-secondary d-none rounded-pill btn-float">
                        <i class="fa fa-pen"></i>
                    </button>
                    <div class="col-12 container-fluid d-flex flex-column flex-lg-row">
                        <fieldset
                                class="col-12 col-md-6 mb-4 me-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                            <legend class="n-color">Tareas Diarias</legend>
                            <div class="container-fluid">
                                <div class="container-fluid w-100 d-flex flex-row">
                                    <button id="btnTarea" class="btn btn-primary btn-sm me-2">Agregar Tarea</button>
                                    <button id="btnTareaEdit" class="btn btn-primary btn-sm d-none">Modificar Tarea</button>
                                </div>
                                <table id="table_tareas" class="display w-100 my-2">
                                    <thead>
                                    <tr class="col-12">
                                        <th class="d-none">ID</th>
                                        <th class="col-10">Tarea</th>
                                        <th class="col-2">Estado</th>
                                        <th class="d-none">EstadoID</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </fieldset>

                        <fieldset
                                class="col-12 col-md-6 col-lg-4 mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2 field-balance">
                            <legend class="n-color">Balance Diario</legend>
                            <div class="container-fluid">
                            <span class="input-group-text mb-3">
                                <label class="n-color  text-center">Gan: $</label>
                                <label id="montoTotal" class="n-color  text-center"></label>
                            </span>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>


<!-- Modal Tarea-->
<div class="modal fade" id="modalTarea" tabindex="-1" aria-labelledby="modalTareaLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalTareaLabel">Agregar Tarea</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formTarea" action="<?php echo site_url('AdminCitas/addTarea'); ?>" method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputNombreTarea" class="n-color">Nombre
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputNombreTarea" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarTarea" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Tarea Edit-->
<div class="modal fade" id="modalTareaEdit" tabindex="-1" aria-labelledby="modalTareaEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalTareaEditLabel">Modificar Tarea</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formTareaEdit" action="<?php echo site_url('AdminCitas/editTarea'); ?>" method="post">
                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
                        <label for="inputNombreTareaEdit" class="n-color">Nombre
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control form-control-sm" id="inputNombreTareaEdit" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputEstadoTareaEdit" class="n-color">Estado</label>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                            <select id="inputEstadoTareaEdit" class="form-select" aria-label="Default select example">
                                <option value="" disabled="disabled" selected>Seleccione...</option>
                                <option value="1">Completa</option>
                                <option value="0">Pendiente</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarTareaEdit" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalCitaLabel">Agregar Cita Médica</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formCita" action="<?php echo site_url('AdminCitas/addCita'); ?>" method="post">
                <div class="modal-body">
                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <div class="col-12  my-2 px-4">
                            <label for="inputPaciente" class="n-color">Paciente</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <select id="inputPaciente" class="form-select" aria-label="Default select example" required>
                                    <option value="" disabled="disabled" selected>Seleccione...</option>
                                    <?php foreach ($pacientes as $paciente) { ?>
                                        <option value="<?= $paciente['idpaciente'] ?>"><?= $paciente['nombre'] ?></option>
                                    <?php } ?>
                                </select>
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
                            <div class="col-12 col-md-4 col-xl-3 my-2 px-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="inputPago">
                                    </span>
                                    <label for="inputPago" class="n-color form-control text-center">Pago</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3 my-2 px-4">
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


<!-- Modal Edit-->
<div class="modal fade" id="modalCitaEdit" tabindex="-1" aria-labelledby="modalCitaLabelEdit" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalCitaLabelEdit">Editar Cita Médica</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formCitaEdit" action="<?php echo site_url('AdminCitas/editCita'); ?>" method="post">
                <div class="modal-body">
                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <div class="col-12  my-2 px-4">
                            <label for="inputPacienteEdit" class="n-color">Paciente</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <select id="inputPacienteEdit" class="form-select" aria-label="Default select example" required>
                                    <option value="" disabled="disabled" selected>Seleccione...</option>
                                    <?php foreach ($pacientes as $paciente) { ?>
                                        <option value="<?= $paciente['idpaciente'] ?>"><?= $paciente['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="my-4 d-flex flex-row flex-wrap px-0 px-md-2">
                        <legend>Datos de Consulta</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
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

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputHoraEdit" class="n-color">Hora
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="time" class="form-control datepicker" id="inputHoraEdit" required>
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

                        <div class="col-12 d-flex flex-column flex-md-row">
                            <div class="col-12 col-md-2 my-2 px-4">
                                <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <input class="form-check-input" type="checkbox" role="switch"
                                   id="inputPagoEdit">
                        </span>
                                    <label for="inputPagoEdit" class="n-color form-control text-center">Pago</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-2 my-2 px-4">
                                <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <input class="form-check-input" type="checkbox" role="switch"
                                   id="inputBoletaEdit">
                        </span>
                                    <label for="inputBoletaEdit" class="n-color form-control text-center">Boleta</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputMontoEdit" class="n-color">Monto</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="number" class="form-control" id="inputMontoEdit">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEdit" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>


        </div>
    </div>
</div>

<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/user-diario.js"></script>
</body>
</html>