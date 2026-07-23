<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Usuarios</title>

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
    <div class="row d-flex align-items-center justify-content-center">
        <main class="col-12 col-lg-10 p-0 ">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 px-5 mb-5 border-bottom bg-grad text-white">
                <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Administrar Usuarios</h1>
                <div class="btn-toolbar mb-2 mb-md-0 col-12 col-md-3 col-xl-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary rounded-pill w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuario">
                        Agregar Nuevo
                        <i class="fa fa-add"></i>
                    </button>
                </div>
            </div>

            <div class="row my-0 mx-2 mx-md-5 border pt-5 rounded-2 n-box">
                <form id="formGetUsuarios" action="<?php echo site_url('AdminUsuarios/getUsers'); ?>"></form>
                <table id="table_id" class="display w-100">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th class="d-none">Rolid</th>
                        <th>Estado</th>
                        <th class="d-none">Activoid</th>
                    </tr>
                    </thead>
                </table>
                <div class="container-fluid d-flex justify-content-end mt-3 mb-4">
                    <button id="btnEdit" class="btn btn-secondary d-none rounded-pill">Modificar Usuario
                        <i class="fa fa-pen ms-1"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto" id="modalUsuario2">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalUsuarioLabel">Agregar Nuevo Usuario</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formUsuario" action="<?php echo site_url('AdminUsuarios/addUser'); ?>" method="post">
                <div class="modal-body d-flex flex-row flex-wrap">

                    <div class="col-12 my-2 px-4">
                        <label for="inputNombre" class="n-color">Nombre
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control" id="inputNombre" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputEmail" class="n-color">Email
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="email" class="form-control" id="inputEmail" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputPassword" class="n-color">Password
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
                        <label for="srcRol" class="n-color">Rol
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <select id="srcRol" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardar" type="button" class="btn btn-primary rounded-pill">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUsuarioEdit" tabindex="-1" aria-labelledby="modalUsuarioEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border ">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalUsuarioEditLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close n-color white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formUsuarioEdit" action="<?php echo site_url('AdminUsuarios/editUser'); ?>" method="post">
                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
                        <label for="inputNombreEdit" class="n-color">Nombre
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" class="form-control" id="inputNombreEdit" required>
                        </div>
                    </div>


                    <div class="col-12 my-2 px-4">
                        <label for="inputEmailEdit" class="n-color">Email
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="email" class="form-control" id="inputEmailEdit" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="srcRolEdit" class="n-color">Rol
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <select id="srcRolEdit" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="srcEstadoEdit" class="n-color">Estado
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <select id="srcEstadoEdit" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                <option value="1">Activo</option>
                                <option value="0">Bloqueado</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEditar" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
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
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/admin-usuarios.js"></script>
</body>
</html>