<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dentalplan | Recuperar contraseña</title>
    <?php echo view('heads'); ?>
</head>
<body class="h-100 w-100 d-block n-body">
<div id="loader" class="conteneur_general_load_9">
    <div class="loader_9"></div>
</div>

<input id="base_url" type="hidden" value="<?= base_url() ?>">

<main class="form-signin w-100 h-100 m-auto d-flex align-items-center justify-content-center bg-tertiary">
    <div class="container d-flex justify-content-center">
        <div class="card col-12 col-md-10 col-lg-6">

            <div class="card-header">
                <h3 class="p-0 m-1">Dentalplan - Recuperar contraseña</h3>
            </div>
            <div class="card-body">
                <div class="col-12 my-2 px-4">
                    <label for="inputPassword" class="n-color">Nueva contraseña
                        <span class="text-danger fw-bold">(*)</span>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                        <input type="text" class="form-control" id="inputPassword" required>
                    </div>
                </div>
                <div class="col-12 my-2 px-4">
                    <label for="inputPassword" class="n-color">Repetir Contraseña
                        <span class="text-danger fw-bold">(*)</span>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                        <input type="text" class="form-control" id="inputPasswordTwo" required>
                    </div>
                </div>

                <div class="col-12 my-2 px-4 d-flex justify-content-end">
                    <button id="btnGuardar" type="button" class="btn btn-primary rounded-pill mt-2">Guardar</button>
                </div>
            </div>
        </div>
</main>


<!--+---------------------------------------------------------+-->
<!--|   █████████     █████████     █████████  ██████   ██████|-->
<!--|  ███░░░░░███   ███░░░░░███   ███░░░░░███░░██████ ██████ |-->
<!--| ░███    ░███  ░███    ░███  ███     ░░░  ░███░█████░███ |-->
<!--| ░███████████  ░███████████ ░███          ░███░░███ ░███ |-->
<!--| ░███░░░░░███  ░███░░░░░███ ░███    █████ ░███ ░░░  ░███ |-->
<!--| ░███    ░███  ░███    ░███ ░░███  ░░███  ░███      ░███ |-->
<!--| █████   █████ █████   █████ ░░█████████  █████     █████|-->
<!--|░░░░░   ░░░░░ ░░░░░   ░░░░░   ░░░░░░░░░  ░░░░░     ░░░░░ |-->
<!--+---------------------------------------------------------+-->
<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>

<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/views/js/resetpass.js"></script>

</body>
</html>