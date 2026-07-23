<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Paciente</title>

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
    <div class="row d-flex align-items-center justify-content-center ">
        <main class="col-12 p-0 ">

            <?php if ($logo_exist == true) { ?>
                <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center mb-5 border-bottom bg-grad text-white py-3">
                    <img src="<?php echo base_url() . '/public/uploads/logo/DP.png' ?>" alt=""
                         class="logo_img_user ms-5">
                    <h1 class="h2 n-color ms-3"></i>Pacientes</h1>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                    <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Pacientes</h1>
                </div>
            <?php } ?>

            <div class="row my-0 mx-2 mx-md-5 border pt-5 rounded-2 n-box pb-4">
                <div class="btn-toolbar mb-3  col-12 d-flex flex-column flex-md-row justify-content-between ">
                    <div class="col-12 input-group d-flex flex-row align-items-center justify-content-start diario-toolbar px-2 px-xl-0">
                        <input type="hidden" id="srcUser" value="<?php echo $user_id; ?>">
                        <button type="button" class="btn btn-sm btn-secondary rounded col-12 col-md-auto mb-3 mb-md-0"
                                id="btnAddPaciente">
                            Agregar Paciente
                            <i class="fa fa-add ms-2"></i>
                        </button>

                        <button type="button"
                                class="btn btn-sm btn-secondary rounded mx-0 mx-md-4 d-none col-12 col-md-auto mb-3 mb-md-0"
                                id="btnGoFicha">
                            Ficha Clinica
                            <i class="fa-regular fa-rectangle-list ms-2"></i>
                        </button>
                    </div>


                </div>

                <form id="formGetPaciente"
                      action="<?php echo site_url('UserPaciente/obtieneUserPacientes'); ?>"></form>
                <table id="table_paciente" class="display w-100">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th class="col-4">Paciente</th>
                        <th class="col-1">RUT</th>
                        <th class="col-1">Edad</th>
                        <th class="col-1">Sexo</th>
                        <th class="col-1">Fono</th>
                        <th class="col-2">Mail</th>
                        <th class="col-2">Direccion</th>
                        <th class="col-1">Prevision</th>
                        <th class="d-none">idsexo</th>
                        <th class="d-none">nacionalidad</th>
                    </tr>
                    </thead>

                </table>
                <div class="container-fluid d-flex justify-content-start mt-3 mb-4">
                    <button id="btnEdit" class="btn btn-secondary d-none rounded-pill btn-float">
                        <i class="fa fa-pen"></i>
                    </button>
                </div>
            </div>
        </main>
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
                            <label for="inputNacionalidad" class="n-color">Nacionalidad
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                                <label for="inputNacionalidad" class="input-group-text form-linear" >
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
                                <label for="inputSexo" class="input-group-text form-linear" >
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

<!-- Modal Paciente Edit-->
<div class="modal fade" id="modalPacienteEdit" tabindex="-1" aria-labelledby="modalPacienteEditLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPacienteEditLabel">Modificar Paciente</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formPacienteEdit" action="<?php echo site_url('UserPaciente/editPaciente'); ?>"
                  method="post">

                <div class="modal-body">
                    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
                        <legend class="n-color">Datos del paciente</legend>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputNombreEdit" class="n-color">Nombre
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                                <label for="inputNombreEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputNombreEdit"
                                       required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputRutEdit" class="n-color">RUT
                                <span class="text-danger fw-bold">(*)</span>
                            </label>
                            <div class="input-group mb-3">
                                <label for="inputRutEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputRutEdit" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputNacionalidadEdit" class="n-color">Nacionalidad</label>
                            <div class="input-group mb-3">
                                <label for="inputNacionalidadEdit" class="input-group-text form-linear" >
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <select id="inputNacionalidadEdit" class="form-select form-linear">
                                    <option value="1">Chileno</option>
                                    <option value="2">Extranjero</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputEdadEdit" class="n-color">Edad</label>
                            <div class="input-group mb-3">
                                <label for="inputEdadEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="number" class="form-control form-control-sm form-linear" id="inputEdadEdit">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputSexoEdit" class="n-color">Sexo</label>
                            <div class="input-group mb-3">
                                <label for="inputSexoEdit" class="input-group-text form-linear" >
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <select id="inputSexoEdit" class="form-select form-linear">
                                    <option value="" selected>Seleccione...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputFonoEdit" class="n-color">Teléfono</label>
                            <div class="input-group mb-3">
                                <label for="inputFonoEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputFonoEdit">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputCorreoEdit" class="n-color">Correo</label>
                            <div class="input-group mb-3">
                                <label for="inputCorreoEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="email" class="form-control form-control-sm form-linear" id="inputCorreoEdit">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputDireccionEdit" class="n-color">Dirección</label>
                            <div class="input-group mb-3">
                                <label for="inputDireccionEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputDireccionEdit">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2 px-4">
                            <label for="inputPrevEdit" class="n-color">Previsión</label>
                            <div class="input-group mb-3">
                                <label for="inputPrevEdit" class="input-group-text form-linear">
                                    <i class="fa-solid fa-chevron-right n-color"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm form-linear" id="inputPrevEdit">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarPacienteEdit" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
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
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/user-paciente.js"></script>
</body>
</html>