<!DOCTYPE html>
<html lang="es">
<head>
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9N0GD2RQ0S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9N0GD2RQ0S');
</script>
    
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar al Sistema</title>
    <?php echo view('heads'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/login.css">
</head>
<body class="h-100 w-100 d-block n-body">

<div id="loader" class="conteneur_general_load_9">
    <div class="loader_9"></div>
</div>

<main class="form-signin w-100 h-100 m-auto d-flex align-items-center justify-content-center ">
    <input id="base_url" type="hidden" value="<?= base_url() ?>">
    <input id="err_type" type="hidden" value="<?php if (isset($_REQUEST['err_type'])) echo $_REQUEST['err_type'];?>">
    <form id="loginForm" action="<?php echo site_url('/login/startLogIn'); ?>" method="post"
          class="container n-box n-border col-12 col-md-8 col-lg-6 col-xl-4 p-4 p-md-5 d-flex flex-column ">

        <?= csrf_field() ?>

        <img class="loginLogo" src="<?php echo site_url('/public/logo.png'); ?>" alt="logo">

        <p class="login-tagline text-center">Tu consulta. Tu independencia. Tu crecimiento.</p>

        <h1 class="h3 mb-3 n-title text-center pb-4">Ingresa a nuestra plataforma</h1>

        <div class="w-100 my-2">
            <label for="form-email" class="n-color">Tu Email</label>
            <div class="input-group mb-3 d-flex align-items-center">
                <label class="input-group-text form-linear legend-input" for="form-email">
                    <i class="fa-solid  fa-envelope n-color"></i>
                </label>
                <input type="email" class="form-control form-linear flex-grow-1 input-labeled" placeholder="example@company.com" id="form-email" name="email">
            </div>

        </div>

        <div class="w-100 my-2">
            <label for="form-password" class="n-color">Password</label>
            <div class="input-group mb-3 d-flex align-items-center">
                <label class="input-group-text form-linear legend-input" for="form-password">
                    <i class="fa fa-key n-color"></i>
                </label>
                <input id="form-password" type="password" class="form-control form-linear flex-grow-1 input-labeled" placeholder="Password"
                       name="password">
            </div>
        </div>


        <button id="btnLogin" class="w-100 btn btn-primary mt-4" type="submit">Ingresar</button>
        <hr class="w-100">
        <button id="btnRecover" class="w-100 btn btn-primary" type="button">¿Olvidaste tu contraseña?</button>
        <p class="col-12 mt-2 text-center n-color mt-4">¿Aún no estás registrado? <strong>¡Contacta con Nosotros!</strong>
        </p>
        <p class="col-12 mb-3 text-end n-color">
            <a href="mailto:contacto@dentalplan.cl">contacto@dentalplan.cl</a>
        </p>
    </form>


</main>

<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>

<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/views/js/login.js"></script>
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
</body>
</html>