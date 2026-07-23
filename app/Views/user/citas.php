<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Citas</title>

    <?php echo view('heads'); ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/select2/select2.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/cita.css">
</head>
<body class="n-body">


<div id="loader" class="conteneur_general_load_9 visible h-100 w-100">
    <div class="loader_9"></div>
</div>

<?php echo view('user/user-header'); ?>
<input type="hidden" id="srcUser" value="<?php echo $user_id; ?>">
<input type="hidden" id="hdnNovedades" value="<?php echo count($novedades) ?>">


<div class="container-fluid main-container">
    <div class="row d-flex align-items-center justify-content-center">
        <main class="col-12  p-0 ">

            <?php if ($logo_exist == true) { ?>
                <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center border-bottom bg-grad text-white py-3">
                    <img src="<?php echo base_url() . '/public/uploads/logo/DP.png' ?>" alt=""
                         class="logo_img_user ms-5">
                    <h1 class="h2 n-color ms-3"></i>Agenda</h1>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 border-bottom bg-grad text-white">
                    <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Agenda</h1>
                </div>
            <?php } ?>

            <div class="row my-0 mx-3 border bg-light pt-4 table-container rounded-2 n-box n-border n-body h-auto">
                <input type="hidden" id="srcUsuario" value="<?php echo $user_id ?>">
                <div class="d-flex flex-column col-12 mb-5">
                    <div class="col-12 mb-3 d-flex justify-content-end">
                        <button id="btnModalNuevaCita" type="button" class="btn btn-sm btn-secondary btn-combine"
                                data-bs-toggle="modal"
                                data-bs-target="#modalNuevaCita">
                            Agregar Cita Médica
                            <i class="fa fa-add ms-2"></i>
                        </button>

                    </div>
                    <div id='calendar'></div>
                </div>
            </div>

            <div class="row  mx-3 mt-3 mb-3 border bg-light pt-4 table-container rounded-2 n-box n-border n-body h-auto">
                <div class="d-flex flex-column col-12 mb-5">
                    <h4 class="mx-2">Tareas</h4>
                    <hr>
                    <div class="container-fluid p-0 w-100 d-flex align-items-center justify-content-end mb-3">
                        <button id="btnTarea" class="btn btn-secondary btn-sm">
                            <i class="fa fa-plus-circle mx-2"></i> Agregar Tarea
                        </button>
                    </div>
                    <div class="p-0 w-100">
                        <table id="table_tareas" class="w-100">
                        </table>
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
                        <label for="inputFechaTarea" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputFechaTarea" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="inputFechaTarea"
                                   required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputNombreTarea" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputNombreTarea" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputNombreTarea"
                                      id="inputNombreTarea" required
                                      rows="4"></textarea>
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
                        <legend class="n-color">Paciente</legend>

                        <div class="col-12  my-2 px-4 mb-4">
                            <label for="inputPaciente" class="n-color ">Paciente
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3 d-flex flex-row">
                                <span class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>

                                <select id="inputPaciente" class="form-select flex-grow-1 form-linear ">
                                    <option selected disabled></option>
                                    <?php foreach ($pacientes as $paciente) { ?>
                                        <option value="<?= $paciente['idpaciente'] ?>">
                                            <?= $paciente['nombre'] ?>
                                            - <?= $paciente['rut'] ?>
                                        </option>
                                    <?php } ?>
                                </select>

                                <button type="button" class="btn btn-secondary btn-combine form-linear"
                                        id="btn_link_ficha">
                                    Ver Ficha
                                    <i class="fa-solid fa-folder-closed ms-2"></i>
                                </button>
                            </div>


                            <button type="button" class="btn btn-sm btn-secondary btn-combine form-linear"
                                    id="btnModalPaciente">
                                Registrar Nuevo Paciente
                                <i class="fa fa-add ms-2"></i>
                            </button>
                        </div>

                    </fieldset>


                    <fieldset class="my-4 d-flex flex-row flex-wrap px-0 px-md-2">
                        <legend>Datos de Consulta</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFecha" class="n-color">Fecha
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                        <span class="input-group-text form-linear form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="date" class="form-control datepicker form-linear" id="inputFecha" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFecha" class="n-color">Hora
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="d-flex col-4 hora-container">
                                 <span class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <select id="srcHora" class="form-select form-select-sm col-6 col-md-3 form-linear"
                                        required>
                                    <option value="" disabled="disabled" selected>Hora</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                                <select id="srcMinutos" class="form-select form-select-sm col-6 col-md-3 form-linear"
                                        required>
                                    <option value="" disabled="disabled" selected>Minutos</option>
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="srcDuracion" class="n-color">Duración
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                            <span class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                                <select id="srcDuracion" class="form-select form-select-sm col-3 form-linear" required>
                                    <?php foreach ($duracion as $dur) { ?>
                                        <?php if ($dur['id_duracion'] == 1) { ?>
                                            <option value="<?= $dur['id_duracion'] ?>" nombre="<?= $dur['nombre'] ?>"
                                                    required><?= $dur['nombre'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $dur['id_duracion'] ?>" nombre="<?= $dur['nombre'] ?>"
                                                    required><?= $dur['nombre'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 my-2 px-4">
                            <label for="inputObservacion" class="n-color">Observación</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <textarea class="form-control h-auto form-linear" name="inputObs" id="inputObservacion"
                                          rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column flex-md-row">

                            <div class="col-12 col-md-4 my-2 px-4">
                                <div class="input-group mb-3">
                                <span class="input-group-text form-linear">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="inputPago">
                                </span>
                                    <label for="inputPago"
                                           class="n-color form-control text-center form-linear">Pago</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 my-2 px-4">
                                <div class="input-group mb-3">
                                <span class="input-group-text form-linear">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="inputBoleta">
                                </span>
                                    <label for="inputBoleta"
                                           class="n-color form-control text-center form-linear">Boleta</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputMonto" class="n-color">Monto</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <input type="number" class="form-control form-linear" id="inputMonto">
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column flex-md-row">

                            <div class="col-12 col-md-4 my-2 px-4">
                                <div class="input-group mb-3">
                                <span class="input-group-text form-linear">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="inputAsistencia">
                                </span>
                                    <label for="inputAsistencia"
                                           class="n-color form-control text-center form-linear">Asistencia</label>
                                </div>
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
<div class="modal fade" id="modalEditCita" tabindex="-1" aria-labelledby="modalEditCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalEditCitaLabel">Editar Cita Médica</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formEditCita" action="<?php echo site_url('AdminCitas/editCita'); ?>" method="post">
                <div class="modal-body">
                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <input type="hidden" id="hdnIdCita" value="">

                        <div class="col-12  my-2 px-4">

                            <label for="inputPacienteEdit" class="n-color">Paciente
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3 d-flex flex-row">
                                <span class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <select id="inputPacienteEdit" class="form-select form-linear"
                                        disabled>
                                    <option value="" disabled="disabled" selected>Seleccione...</option>
                                    <?php foreach ($pacientes as $paciente) { ?>
                                        <option value="<?= $paciente['idpaciente'] ?>"><?= $paciente['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                                <button type="button" class="btn btn-secondary btn-combine form-linear"
                                        id="btn_link_ficha_edit">
                                    Ver Ficha
                                    <i class="fa-solid fa-folder-closed ms-2"></i>
                                </button>
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
                            <span class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                                <input type="date" class="form-control datepicker form-linear" id="inputFechaEdit"
                                       required>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFecha" class="n-color">Hora
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="d-flex col-4 hora-container">
                                 <span class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <select id="srcHoraEdit" class="form-select form-select-sm col-3 form-linear" required>
                                    <option value="" disabled="disabled" selected>Hora</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                                <select id="srcMinutosEdit" class="form-select form-select-sm col-3 form-linear"
                                        required>
                                    <option value="" disabled="disabled" selected>Minutos</option>
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="srcDuracionEdit" class="n-color">Duración
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                            <span class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                                <select id="srcDuracionEdit" class="form-select form-select-sm col-3 form-linear"
                                        required>
                                    <?php foreach ($duracion as $dur) { ?>
                                        <option value="<?= $dur['id_duracion'] ?>"><?= $dur['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 my-2 px-4">
                            <label for="inputObservacionEdit" class="n-color">Observación</label>
                            <div class="input-group mb-3">
                        <span class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                                <textarea class="form-control h-auto form-linear" name="inputObs"
                                          id="inputObservacionEdit"
                                          rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column flex-md-row">

                            <div class="col-12 col-md-4 my-2 px-4">
                                <div class="input-group mb-3">
                                <span class="input-group-text form-linear">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="inputPagoEdit">
                                </span>
                                    <label for="inputPagoEdit"
                                           class="n-color form-control text-center form-linear">Pago</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 my-2 px-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text form-linear">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="inputBoletaEdit">
                                    </span>
                                    <label for="inputBoletaEdit" class="n-color form-control text-center form-linear">Boleta</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputMontoEdit" class="n-color">Monto</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </span>
                                <input type="number" class="form-control form-linear" id="inputMontoEdit">
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column flex-md-row">

                            <div class="col-12 col-md-4 my-2 px-4">
                                <div class="input-group mb-3">
                                <span class="input-group-text form-linear">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="inputAsistenciaEdit">
                                </span>
                                    <label for="inputAsistenciaEdit"
                                           class="n-color form-control text-center form-linear">Asistencia</label>
                                </div>
                            </div>

                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnEliminarModal" type="button" class="btn btn-secondary rounded-pill">Eliminar
                    </button>
                    <button id="btnSaveEditar" type="button" class="btn btn-secondary rounded-pill d-flex">Guardar
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>


<!-- Modal Paciente-->
<div class="modal fade" id="modalPaciente" tabindex="-1" aria-labelledby="modalPacienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPacienteLabel">Agregar Paciente</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formPaciente" action="<?php echo site_url('UserPaciente/addPaciente'); ?>"
                  method="post">

                <div class="modal-body">

                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputNombre" class="n-color">Nombre
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                                <label for="inputNombre" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputNombre"
                                       required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputRut" class="n-color">RUT
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                                <label for="inputRut" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputRut"
                                       required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputNacionalidad" class="n-color">Nacionalidad</label>
                            <div class="input-group mb-3">
                                <label for="inputNacionalidad" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <select id="inputNacionalidad" class="form-select form-linear">
                                    <option value="1">Chileno</option>
                                    <option value="2">Extranjero</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputEdad" class="n-color">Edad</label>
                            <div class="input-group mb-3">
                                <label for="inputEdad" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="number" class="form-control form-control-sm form-linear" id="inputEdad">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputSexo" class="n-color">Sexo</label>
                            <div class="input-group mb-3">
                                <label for="inputSexo" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <select id="inputSexo" class="form-select form-linear">
                                    <option value="" selected>Seleccione...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFono" class="n-color">Teléfono</label>
                            <div class="input-group mb-3">
                                <label for="inputFono" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputFono">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputCorreo" class="n-color">Correo</label>
                            <div class="input-group mb-3">
                                <label for="inputCorreo" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="email" class="form-control form-control-sm form-linear" id="inputCorreo">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputDireccion" class="n-color">Dirección</label>
                            <div class="input-group mb-3">
                                <label for="inputDireccion" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputDireccion">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputPrev" class="n-color">Previsión</label>
                            <div class="input-group mb-3">
                                <label for="inputPrev" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputPrev">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarPaciente" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Novedades-->
<div class="modal fade" id="modalNovedades" tabindex="-1" aria-labelledby="modalNovedadesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title n-color" id="modalNovedadesLabel">Dentalplan - Novedades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">

                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php
                        $primero = true; // Variable para controlar el primer elemento
                        foreach ($novedades as $novedad) { ?>
                            <div class="carousel-item <?php echo $primero ? 'active' : ''; ?>" >
                                <img class="w-100" src="<?php echo $novedad['archivo']; ?>" alt="novedades_image">

                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo $novedad['titulo']; ?></h5>
                                </div>

                            </div>
                            <?php $primero = false; // Después del primer elemento, cambiar a false
                        } ?>


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>




            </div>
            <div class="col-12 d-flex align-items-center justify-content-end d-flex flex-column flex-md-row mb-3 p-3 pe-md-3">
                <button type="button" data-bs-dismiss="modal"
                        class="col-12 col-md-auto my-3 my-md-0 btn btn-sm btn-primary mx-0 mx-md-3">Cerrar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalElimCita" tabindex="-1" aria-labelledby="modalElimCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title n-color" id="modalElimCitaLabel">Eliminar Cita Médica</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <H5 class="col-12 d-flex align-items-center justify-content-center mb-3">¿Esta Seguro que desea Eliminar
                    esta Cita Médica?</H5>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-end d-flex flex-column flex-md-row mb-3 pe-0 pe-md-3">
                <button type="button" data-bs-dismiss="modal"
                        class="col-12 col-md-auto my-3 my-md-0 btn btn-sm btn-primary mx-0 mx-md-3">Cancelar
                </button>
                <button id="btnEliminar" class="col-12 col-md-auto btn btn-sm btn-primary mr-0">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Paciente-->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalConfirmacionLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalConfirmacionLabel">Modificar cita</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>


            <div class="modal-body d-flex flex-column">
                <div class=" col-12 d-flex align-items-center justify-content-center mb-3">
                    <span class="icon-circlet">
                        <i class="fa-solid fa-2x fa-exclamation"></i>
                    </span>
                </div>
                <H5 class="col-12 d-flex align-items-center justify-content-center mb-3">¿Esta seguro que desea
                    modificar esta cita?</H5>
                <div class="col-12 d-flex align-items-center justify-content-end d-flex flex-column flex-md-row mb-3">
                    <button id="btn_cancel_drag"
                            class="col-12 col-md-auto my-3 my-md-0 btn btn-sm btn-primary mx-0 mx-md-3">Cancelar
                    </button>
                    <button id="btn_acept_drag" class="col-12 col-md-auto btn btn-sm btn-primary mr-0">Aceptar</button>
                </div>

            </div>
        </div>
    </div>
</div>


<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src='<?php echo base_url() ?>/assets/select2/select2.min.js'></script>

<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script type="text/javascript" src='<?php echo base_url() ?>/assets/calendar/index.global.js'></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/user-citas.js"></script>

</body>
</html>