<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Mensual</title>

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
    <div class="row d-flex align-items-center justify-content-center">
        <main class="col-12  p-0 ">

            <?php if ($logo_exist == true) { ?>
                <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center border-bottom bg-grad text-white py-3">
                    <img src="<?php echo base_url() . '/public/uploads/logo/DP.png' ?>" alt=""
                         class="logo_img_user ms-5">
                    <h1 class="h2 n-color ms-3">Finanzas mensuales</h1>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-5 pb-2 mb-5 border-bottom bg-grad text-white">
                    <h1 class="h2 n-color"><i class="fas fa-user pe-3"></i>Finanzas mensuales</h1>
                </div>
            <?php } ?>

            <div class="col-12 border pt-3 px-3 rounded-2 n-box">
                <div class="btn-toolbar mb-3  col-12 d-flex flex-column flex-md-row justify-content-between ">
                    <div class="input-group d-flex flex-row align-items-center justify-content-between diario-toolbar px-2 px-xl-0">
                        <div class="input-group w-100">
                        <span class="input-group-text input-group input-group-sm">
                            <label for="usrFecha" class="n-color">Filtro</label>
                        </span>
                            <select id="srcMes" class="form-select form-select-sm" aria-label="Default select example">
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
                            <select id="srcAnio" class="form-select form-select-sm" aria-label="Default select example">
                                <option value="" disabled="disabled" selected>Año...</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
				<option value="2026">2026</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center justify-content-end diario-toolbar px-2 px-xl-0">
                        <input type="hidden" id="srcUser" value="<?php echo $user_id; ?>">
                    </div>
                </div>

                <div class="col-12 justify-content-around mt-0 mb-3 pt-3 ficha-menu-container d-flex flex-column flex-md-row">
                    <div class="col-12 col-md-6 pe-1">
                        <div class="col-12 d-flex align-items-center justify-content-between border-bottom border-top border-dark py-2 my-2">
                            <span class="col-2"></span>
                            <h5>Ingresos</h5>
                            <button type="button" class="btn btn-sm btn-secondary btn-combine" id="btnModalAddIngreso">
                                Registrar Otros Ingresos
                                <i class="fa fa-add ms-2"></i>
                            </button>
                        </div>
                        <table id="table_citas" class="display w-100">
                            <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>Fecha</th>
                                <th>Paciente</th>
                                <th>Detalle</th>
                                <th>Pago</th>
                                <th>Boleta</th>
                                <th>Valor</th>
                                <th class="d-none">valor_num</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="col-12 d-flex align-items-center justify-content-between border-bottom border-top border-dark py-2 my-2">
                            <span class="col-2"></span>
                            <h5>Egresos</h5>
                            <button type="button" class="btn btn-sm btn-secondary btn-combine" id="btnModalAddEgreso">
                                Registrar Egreso
                                <i class="fa fa-add ms-2"></i>
                            </button>
                        </div>
                        <table id="table_id" class="display w-100">
                            <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>Fecha</th>
                                <th>Detalle</th>
                                <th>Valor</th>
                                <th class="d-none">Valor Num</th>
                                <th class="d-none">Tipo Egreso</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="container-fluid d-flex justify-content-start mt-3 mb-4">
                    <button id="btnEdit" class="btn btn-secondary d-none rounded-pill btn-float">
                        <i class="fa fa-pen"></i>
                    </button>
                    <div class="col-12 container-fluid d-flex flex-column flex-lg-row">
                        <fieldset class="col-12 col-md-6 col-lg-4 mb-4 d-flex flex-row flex-wrap
                            justify-content-between px-0 px-md-2 field-balance">
                            <legend class="n-color">Balance Mensual</legend>

                            <div class="container-fluid mb-3">
                                <div class="col-12 d-flex flex-row align-items-center justify-content-start">
                                    <span class="col-11 input-group-text d-flex flex-row justify-content-between">
                                        <label class="n-color  text-center">Mensual Bruto: </label>
                                        <label id="bruto" class="n-color  text-center"></label>
                                    </span>
                                    <i id="btnDetalleIngreso"
                                       class="btnDetalleFinanzas fa-solid fa-arrow-down ms-2 invisible collapsed"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#detalleIngresos" aria-expanded="false"
                                       aria-controls="detalleIngresos"></i>
                                </div>
                                <div class="collapse col-11" id="detalleIngresos">
                                    <ul class="list-group col-12" id="itemIngresoContainer">
                                        <li class="itemEgresoElement list-group-item">
                                            <span class="itemEgresoNombre col-7"></span>
                                            <div class="d-flex flex-row">
                                                <span class="col-2">$</span>
                                                <span class="col-10 itemEgresoValor"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="container-fluid mb-3">
                                <div id="descuentosContainer"
                                     class="col-12 d-flex flex-row align-items-center justify-content-start">
                                    <span class="input-group-text col-11 d-flex flex-row justify-content-between">
                                        <label class="n-color  text-center">Descuentos: </label>
                                        <label id="descuentos" class="n-color  text-center"></label>
                                    </span>
                                    <i id="btnDetalleEgresos"
                                       class="btnDetalleFinanzas fa-solid fa-arrow-down ms-2 invisible collapsed"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#detalleDescuentos" aria-expanded="false"
                                       aria-controls="detalleDescuentos"></i>
                                </div>

                                <div class="collapse col-11" id="detalleDescuentos">
                                    <ul class="list-group col-12" id="itemEgresoContainer">
                                        <li class="itemEgresoElement list-group-item">
                                            <span class="itemEgresoNombre col-7"></span>
                                            <div class="d-flex flex-row">
                                                <span class="col-2">$</span>
                                                <span class="col-10 itemEgresoValor"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="container-fluid mb-3">
                                <div id="netoContainer"
                                     class="col-12 d-flex flex-row align-items-center justify-content-start">
                                    <span class="col-11 input-group-text d-flex flex-row justify-content-between">
                                        <label class="n-color  text-center">Mensual Neto: </label>
                                        <label id="neto" class="n-color  text-center"></label>
                                    </span>
                                    <i id="btnDetalleNeto"
                                       class="btnDetalleFinanzas fa-solid fa-arrow-down ms-2 invisible collapsed"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#detalleNeto" aria-expanded="false"
                                       aria-controls="detalleNeto"></i>
                                </div>

                                <div class="collapse col-11" id="detalleNeto">
                                    <ul class="list-group col-12" id="itemNetoContainer">
                                        <li class="itemEgresoElement list-group-item">
                                            <span class="itemEgresoNombre col-7"></span>
                                            <div class="d-flex flex-row">
                                                <span class="col-2">$</span>
                                                <span class="col-10 itemEgresoValor"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="accordion mb-3 col-12 col-md-10 col-lg-8" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold d-flex align-items-center flex-row justify-content-center"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#tareasCollapse"
                                    aria-expanded="false" aria-controls="tareasCollapse">
                                <span><i class="fa fa-tasks"></i> Tareas</span>
                            </button>
                        </h2>
                        <div id="tareasCollapse" class="accordion-collapse collapse n-body"
                             data-bs-parent="#tareasCollapse">
                            <div class="accordion-body d-flex flex-column">
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
                            <span class="input-group-text">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                            <input type="date" class="form-control datepicker" id="inputFechaTarea" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputNombreTarea" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea class="form-control h-auto" name="inputNombreTarea" id="inputNombreTarea" required
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
                            <span class="input-group-text">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                            <input type="date" class="form-control datepicker" id="inputFecha" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputTipoEgreso" class="n-color">Tipo de egreso
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                            <select id="inputTipoEgreso" class="form-select" required>
                                <option value="" selected>Seleccione...</option>
                                <?php foreach ($tipo_egreso as $tipo) { ?>
                                    <option class="sel_option"
                                            value="<?php echo $tipo['idtipo_egreso'] ?>"><?php echo $tipo['nombre_tipo_egreso'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDetalle" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea class="form-control h-auto" name="inputObs" id="inputDetalle" required
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputValor" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
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
            <form id="formEgresoEdit" action="<?php echo site_url('UserMensual/editEgreso'); ?>" method="post">
                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
                        <label for="inputFechaEdit" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="date" class="form-control datepicker" id="inputFechaEdit" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputTipoEgresoEdit" class="n-color">Tipo de egreso
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                            <select id="inputTipoEgresoEdit" class="form-select" required>
                                <option value="" selected>Seleccione...</option>
                                <?php foreach ($tipo_egreso as $tipo) { ?>
                                    <option class="sel_option"
                                            value="<?php echo $tipo['idtipo_egreso'] ?>"><?php echo $tipo['nombre_tipo_egreso'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDetalleEdit" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
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
                        <span class="input-group-text">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" class="form-control" id="inputValorEdit" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEgresoEdit" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Ingreso-->
<div class="modal fade" id="modalIngreso" tabindex="-1" aria-labelledby="modalIngresoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalIngresoLabel">Registrar Otros Ingresos </h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formIngreso">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputIngresoFecha" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="date" class="form-control datepicker" id="inputIngresoFecha" required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputIngresoDetalle" class="n-color">Detalle
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <textarea required class="form-control datepicker h-auto" name="inputIngresoDetalle"
                                      id="inputIngresoDetalle"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputIngresoPago" class="n-color">Pago
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                            <select id="inputIngresoPago" class="form-control datepicker" required>
                                <option value="1" selected>Si</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputIngresoBoleta" class="n-color">Boleta
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </span>
                            <select id="inputIngresoBoleta" class="form-control datepicker" required>
                                <option value="1" selected>Si</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-12 my-2 px-4">
                        <label for="inputIngresoValor" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" class="form-control datepicker" id="inputIngresoValor" required>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                </button>
                <button id="btnGuardarIngreso" type="button" class="btn btn-secondary rounded-pill">Guardar
                </button>
            </div>
        </div>
    </div>
</div>


<?php echo view('toast'); ?>
<?php echo view('scripts'); ?>
<script src="<?php echo base_url() ?>/assets/views/js/toast.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatables/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/views/js/user-mensual.js"></script>
</body>
</html>