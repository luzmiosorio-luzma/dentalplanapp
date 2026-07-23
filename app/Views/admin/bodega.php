<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Bodega</title>

    <?php echo view('heads'); ?>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/views/css/dashboard.css">

</head>
<body class="bg-body">
<div id="loader" class="conteneur_general_load_9 visible">
    <div class="loader_9"></div>
</div>

<?php echo view('admin/admin-header'); ?>

<div class="container-fluid ">
    <div class="row ">

        <?php echo view('admin/admin-sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-0 ">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-4 pb-2 px-4 mb-3 border-bottom bg-grad text-white page-board">

                <h1 class="h2"><i class="fas fa-user pe-3"></i>Bodega</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-light rounded-pill"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUsuario">
                        Agregar Nuevo
                        <i class="fa fa-add"></i>
                    </button>
                </div>
            </div>

            <div class="row my-0 mx-3 border bg-light pt-4 table-container rounded-2">
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
                    <button id="btnEdit" class="btn btn-warning d-none rounded-pill">Modificar Usuario
                        <i class="fa fa-pen ms-1"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" id="modalUsuario2">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalUsuarioLabel">Agregar Nuevo Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formUsuario" action="<?php echo site_url('AdminUsuarios/addUser'); ?>" method="post">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNombre" required>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control formUsuario" id="inputEmail" required>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control formUsuario" id="inputPassword" required>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="srcRol" class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">
                            <select id="srcRol" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalUsuarioEditLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close btn-close-white text-white white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formUsuarioEdit" action="<?php echo site_url('AdminUsuarios/editUser'); ?>" method="post">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="inputNombreEdit" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNombreEdit" required>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailEdit" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control formUsuario" id="inputEmailEdit" required>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="srcRolEdit" class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">
                            <select id="srcRolEdit" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="srcEstadoEdit" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select id="srcEstadoEdit" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled="disabled" selected>Seleccione Uno</option>
                                <option value="1">Activo</option>
                                <option value="0">Bloqueado</option>
                            </select>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEditar" type="button" class="btn btn-primary rounded-pill">Guardar</button>
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