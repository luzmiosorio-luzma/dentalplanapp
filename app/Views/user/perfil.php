<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Perfil</title>

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

<div id="loader_file" class="conteneur_general_load_9">
    <div class="progress col-12 col-md-6 h-auto p-2">
        <fieldset class="w-100 pb-3">
            <legend>Subiendo Informacion</legend>
            <div id="progress_bar" class="progress-bar bg-tertiary pb-2 rounded-pill" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </fieldset>
    </div>
</div>


<?php echo view('user/user-header'); ?>

<div class="container-fluid main-container">
    <div class="row d-flex align-items-center justify-content-center ">
        <main class="col-12  p-0 ">


            <?php if ($logo_exist == true) { ?>
                <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center mb-5 border-bottom bg-grad text-white py-3">
                    <img src="<?php echo base_url() . '/public/uploads/logo/DP.png' ?>" alt=""
                         class="logo_img_user ms-5">
                    <h1 class="h2 n-color ms-3"></i>Perfil</h1>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                    <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Perfil</h1>
                </div>
            <?php } ?>

            <div class="row my-0 mx-2 mx-md-5 border rounded-2 n-box pb-4">

                <input type="hidden" id="srcUser" value="<?php echo $user_id; ?>">

                <form id="formUsuario">
                    <div class="container ">
                        <fieldset class="my-4 d-flex flex-row flex-wrap px-0 px-md-2">
                            <legend>Datos de Usuario</legend>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputNombre" class="n-color">Nombre
                                    <span class="text-danger fw-bold">(*)</span>
                                </label>
                                <div class="input-group mb-3">
                                    <label for="inputNombre" class="input-group-text form-linear">
                                        <i class="fa-solid fa-chevron-right n-color"></i>
                                    </label>
                                    <input type="text"
                                           class="form-control form-linear flex-grow-1 form-linear flex-grow-1"
                                           id="inputNombre" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputMail" class="n-color">Email
                                    <span class="text-danger fw-bold">(*)</span>
                                </label>
                                <div class="input-group mb-3">
                                    <label for="inputMail" class="input-group-text form-linear">
                                        <i class="fa-solid fa-chevron-right n-color"></i>
                                    </label>
                                    <input type="email" class="form-control form-linear flex-grow-1-sm" id="inputMail"
                                           required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputFono" class="n-color">Teléfono</label>
                                <div class="input-group mb-3">
                                    <label for="inputFono" class="input-group-text form-linear">
                                        <i class="fa-solid fa-chevron-right n-color"></i>
                                    </label>
                                    <input type="text" class="form-control form-linear flex-grow-1" id="inputFono">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputOficina" class="n-color">Oficina</label>
                                <div class="input-group mb-3">
                                    <label for="inputOficina" class="input-group-text form-linear">
                                        <i class="fa-solid fa-chevron-right n-color"></i>
                                    </label>
                                    <input type="text" class="form-control form-linear flex-grow-1" id="inputOficina">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputRrss" class="n-color">Red Social</label>
                                <div class="input-group mb-3">
                                    <label for="inputRrss" class="input-group-text form-linear">
                                        <i class="fa-solid fa-chevron-right n-color"></i>
                                    </label>
                                    <input type="text" class="form-control form-linear flex-grow-1" id="inputRrss">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputLogo" class="n-color">Logo Personal
                                    <a href="#" id="logo_enlace" target="_blank"> (Ver Logo)</a>
                                </label>
                                <div class="input-group mb-3">
                                    <label for="inputLogo" class="input-group-text form-linear">
                                        <i class="fa-solid fa-chevron-right n-color"></i>
                                    </label>
                                    <div class="form-control form-linear flex-grow-1">
                                        <label for="inputLogo" class="col-12">Modificar Imagen</label>
                                        <input type="file" id="inputLogo" placeholder="Modificar Logo"
                                               style="visibility:hidden;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2 px-4">
                                <label for="inputLogo" class="n-color">Firma Personal
                                    <a href="#" id="logo_enlace" target="_blank"> (Ver Logo)</a>
                                </label>
                                <div class="input-group mb-3">
                                    <button type="button"
                                            class="btn btn-sm btn-secondary rounded col-12 col-md-auto mb-3 mb-md-0"
                                            id="btnFirma">
                                        Agregar Firma
                                        <i class="fa fa-add ms-2"></i>
                                    </button>
                                </div>
                            </div>


                        </fieldset>
                    </div>
                </form>
                <div class="container-fluid d-flex justify-content-end mt-3 mb-4 px-4 px-md-5">
                    <button type="button" class="btn btn-sm btn-secondary col-12 col-sm-auto" id="btnGuardar">
                        Guardar
                        <i class="fa fa-check ms-2"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>



<!-- Modal Firma-->
<div class="modal fade" id="modalFirma" tabindex="-1" aria-labelledby="modalFirmaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalFirmaLabel">Firma personal</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formPaciente" method="post">

                <div class="modal-body d-flex align-items-center justify-content-center flex-column ">
                    <div class="container-fluid col-12  d-flex align-items-center justify-content-center me-auto me-md-0">
                        <canvas id="canvasFirma"></canvas>
                    </div>
                    <div class="container-fluid col-12 d-flex align-items-start justify-content-center mt-2">
                        <button type="button"
                                class="btn btn-sm btn-secondary rounded col-12 col-md-auto mb-3 mb-md-0"
                                id="btnResetFirma">
                            Reiniciar
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarFirma" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/user-perfil.js"></script>
</body>
</html>