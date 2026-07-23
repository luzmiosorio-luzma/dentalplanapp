<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Ficha</title>

    <?php echo view('heads'); ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/quill/snow.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/quill/bubble.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/ficha.css">
    <!-- Theme included stylesheets -->


</head>
<body class="n-body">



<div id="loader" class="conteneur_general_load_9 visible">
    <div class="loader_9"></div>
</div>
<?php echo view('user/user-header'); ?>

<input type="hidden" id="srcUser" value="<?php echo $user_id; ?>">
<input type="hidden" id="srcPaciente" value="<?= $paciente['id_paciente']; ?>">
<input type="hidden" id="hdnBaseUrl" value="<?= base_url() ?>">

<div class="container-fluid main-container p-0 p-md-2">
    <div class="d-flex align-items-center justify-content-center ">
        <main class="col-12 col-lg-11 p-0 mb-3">

            <div class="ficha-container-integrated mx-2">
                <!-- Integrated Header with Logo and Patient Info -->
                <div class="ficha-header-modern">
                    <?php if ($logo_exist == true) { ?>
                        <img src="<?php echo base_url() . '/public/uploads/logo/DP.png' ?>" alt="logo" class="logo_img_user ms-5">
                    <?php } else { ?>
                        <div class="header-icon-fallback"><i class="fas fa-user-circle fa-3x n-color"></i></div>
                    <?php } ?>
                    
                    <div class="ficha-header-info">
                        <h2><?= $paciente['nombre'] ?></h2>
                        <p>Ficha Clínica · Historial Médico</p>
                    </div>
                </div>

                <!-- Mobile Navigation Button (Vertical only for very small screens) -->
                <div class="col-12 d-md-none p-2">
                    <button id="ficha-menu-movil-btn" class="btn btn-secondary btn-sm w-100" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#ficha-menu-movil-container"
                            aria-expanded="false"
                            aria-controls="ficha-menu-movil-container">
                        <i class="fas fa-bars me-2"></i> Navegar Menú
                    </button>
                </div>

                <!-- Navigation Menu (Horizontal on Desktop, Collapsible on Mobile) -->
                <div class="col-12 collapse d-md-block" id="ficha-menu-movil-container">
                    <ul class="ficha-menu-container-modern" id="ficha-menu-movil">
                        <li id="ana-corta-btn" class="ficha-menu-item-modern active" onclick="switcharea(1)">
                            <i class="fa-solid fa-file-medical"></i>
                            <span>Anamnesis corta</span>
                        </li>
                        <li id="odonto-btn" class="ficha-menu-item-modern" onclick="switcharea(2)">
                            <i class="fa-solid fa-tooth"></i>
                            <span>Odontograma</span>
                        </li>
                        <li id="ana-detalle-btn" class="ficha-menu-item-modern" onclick="switcharea(3)">
                            <i class="fa-solid fa-clipboard-list"></i>
                            <span>Anamnesis Detallada</span>
                        </li>
                        <li id="evolucion-btn" class="ficha-menu-item-modern" onclick="switcharea(4)">
                            <i class="fa-solid fa-stethoscope"></i>
                            <span>Evolución Clínica</span>
                        </li>
                        <li id="horas-btn" class="ficha-menu-item-modern" onclick="switcharea(5)">
                            <i class="fa-solid fa-calendar-day"></i>
                            <span>Horas Clínicas</span>
                        </li>
                        <li id="presupuestos-btn" class="ficha-menu-item-modern" onclick="switcharea(6)">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                            <span>Presupuestos</span>
                        </li>
                        <li id="recetas-btn" class="ficha-menu-item-modern" onclick="switcharea(7)">
                            <i class="fa-solid fa-pills"></i>
                            <span>Recetas médicas</span>
                        </li>
                        <li id="radiografias-btn" class="ficha-menu-item-modern" onclick="switcharea(8)">
                            <i class="fa-solid fa-x-ray"></i>
                            <span>Radiografías</span>
                        </li>
                        <li id="consentimiento-btn" class="ficha-menu-item-modern" onclick="switcharea(9)">
                            <i class="fa-solid fa-file-signature"></i>
                            <span>Consentimiento</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container-fluid col-12 p-0 p-md-2">

                <?php echo view('user/ficha/anamnesis_corta'); ?>

                <?php echo view('user/ficha/odontograma'); ?>

                <?php echo view('user/ficha/anamnesis_detallada'); ?>

                <?php echo view('user/ficha/evolucion'); ?>

                <?php echo view('user/ficha/horas_clinicas'); ?>

                <?php echo view('user/ficha/presupuestos'); ?>

                <?php echo view('user/ficha/recetas'); ?>

                <?php echo view('user/ficha/radiografias'); ?>

                <?php echo view('user/ficha/consentimiento'); ?>


            </div>
        </main>
    </div>
</div>

<?php echo view('user/ficha/presupuestos-modal'); ?>
<?php echo view('user/ficha/evolucion-modal'); ?>
<?php echo view('user/ficha/odonto-modal'); ?>
<?php echo view('user/ficha/anamnesis-modal'); ?>
<?php echo view('user/ficha/recetas-modal'); ?>
<?php echo view('user/ficha/radiografias-modal'); ?>
<?php echo view('user/ficha/consentimiento-modal'); ?>



<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>



<!-- Main Quill library -->
<script type="text/javascript" src="<?php echo base_url() ?>/assets/html2pdf/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/quill/quil.js"></script>
<script type="text/javascript" src='<?php echo base_url() ?>/assets/select2/select2.min.js'></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/user-ficha.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/anamnesis_corta.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/presupuestos.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/anamnesis_detallada.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/evolucion.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/horas_clinicas.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/odontograma.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/recetas.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/radiografias.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/ficha/consentimiento.js"></script>

</body>
</html>