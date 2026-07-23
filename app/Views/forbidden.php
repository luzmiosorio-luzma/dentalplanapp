<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dentalplan | Forbidden</title>
    <?php echo view('heads'); ?>
</head>
<body class="h-100 w-100 d-block n-body">

<main class="form-signin w-100 h-100 m-auto d-flex align-items-center justify-content-center bg-tertiary">
    <div class="container d-flex justify-content-center">
        <div class="card col-12 col-md-10 col-lg-6 bg-danger text-white">
            <div class="card-header">
                <h3 class="p-0 m-1">Dentalplan - Forbidden</h3>
            </div>
            <div class="card-body">
                <div class="col-12 my-2 px-4 d-flex justify-content-center">
                   <h4><i class="fa-solid fa-ban mx-2"></i> La URL utilizada no es valida <i class="fa-solid fa-ban mx-2"></i></h4>
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
</body>
</html>