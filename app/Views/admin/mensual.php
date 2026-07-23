<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Mensual</title>

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
                <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Egresos Mensuales</h1>

            </div>

            <div class="row my-0 mx-2 mx-md-5 border pt-5 rounded-2 n-box">

                <div class="btn-toolbar mb-3  col-12 d-flex flex-column flex-md-row justify-content-between ">

                    <div class="input-group d-flex flex-row align-items-center justify-content-between diario-toolbar px-2 px-xl-0">
                        <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <label for="usrFecha" class="n-color">Filtro</label>
                        </span>
                            <select id="srcMes" class="form-select" aria-label="Default select example">
                                <option value="" disabled="disabled" selected>Mes...</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <select id="srcAnio" class="form-select" aria-label="Default select example">
                                <option value="" disabled="disabled" selected>Año...</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group d-flex flex-row align-items-center justify-content-between diario-toolbar px-2 px-xl-0">
                        <select id="srcUser" class="form-select" aria-label="Default select example" required>
                            <option value="" disabled="disabled" selected>Seleccione Uno</option>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <option class="sel_option"
                                        value=" <?php echo $usuario['id'] ?>"><?php echo $usuario['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="button" class="btn btn-secondary btn-combine" id="btnModalAddEgreso">
                            Agregar Egreso
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>

                </div>

                <form id="formBalance" action="<?php echo site_url('AdminMensual/getBalance'); ?>"></form>
                <table id="table_id" class="display w-100">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Fecha</th>
                        <th>Detalle</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                </table>
                <div class="container-fluid d-flex justify-content-start mt-3 mb-4">
                    <button id="btnEdit" class="btn btn-secondary d-none rounded-pill btn-float">
                        <i class="fa fa-pen"></i>
                    </button>
                    <div class="col-12 container-fluid d-flex flex-column flex-lg-row">
                        <fieldset
                                class="col-12 col-md-6 col-lg-4 mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2 field-balance">
                            <legend class="n-color">Balance Mensual</legend>
                            <div class="container-fluid">
                            <span class="input-group-text mb-3 d-flex flex-row justify-content-between">
                                <label class="n-color  text-center">Mensual Bruto: </label>
                                <label id="bruto" class="n-color  text-center"></label>
                            </span>
                            </div>

                            <div class="container-fluid">
                            <span class="input-group-text mb-3 d-flex flex-row justify-content-between">
                                <label class="n-color  text-center">Descuentos: </label>
                                <label id="descuentos" class="n-color  text-center"></label>
                            </span>
                            </div>

                            <div class="container-fluid">
                            <span class="input-group-text mb-3 d-flex flex-row justify-content-between">
                                <label class="n-color  text-center">Mensual Neto: </label>
                                <label id="neto" class="n-color  text-center"></label>
                            </span>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>


<!-- Modal Egreso-->
<div class="modal fade" id="modalEgreso" tabindex="-1" aria-labelledby="modalEgresoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalEgresoLabel">Ingresar Egreso</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formEgreso" action="<?php echo site_url('AdminMensual/addEgreso'); ?>" method="post">
                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
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

                    <div class="col-12 my-2 px-4">
                        <label for="inputDetalle" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea class="form-control h-auto" name="inputObs" id="inputDetalle"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputValor" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" class="form-control" id="inputValor" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEgreso" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Egreso Edit-->
<div class="modal fade" id="modalEgresoEdit" tabindex="-1" aria-labelledby="modalEgresoEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalEgresoEditLabel">Actualizar Egreso</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formEgresoEdit" action="<?php echo site_url('AdminMensual/editEgreso'); ?>" method="post">
                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
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

                    <div class="col-12 my-2 px-4">
                        <label for="inputDetalleEdit" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea class="form-control h-auto" name="inputObs" id="inputDetalleEdit"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputValorEdit" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" class="form-control" id="inputValorEdit" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEgresoEdit" type="button" class="btn btn-secondary rounded-pill">Guardar</button>
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
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/admin-mensual.js"></script>
</body>
</html>