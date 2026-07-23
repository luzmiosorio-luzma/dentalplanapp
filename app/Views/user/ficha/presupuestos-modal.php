<!-- Modal Presupuesto-->
<div class="modal fade" id="modalPresupuesto" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalPresupuestoLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPresupuestoLabel">Crear Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formPresupuesto" action="<?php echo site_url('AdminPresupuesto/addPresupuesto'); ?>"
                  method="post">
                <div class="col-12 col-md-6 my-2 px-4">
                    <label for="inputNombrePresupuesto" class="n-color">Nombre del presupuesto</label>
                    <div class="input-group mb-3">
                        <label for="inputSubtotal" class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </label>
                        <input type="text" required class="form-control form-control-sm form-linear"
                               id="inputNombrePresupuesto">
                    </div>
                </div>


                <div class="modal-body">
                    <div class="container-fluid w-100 d-flex justify-content-end my-3">
                        <button id="btnModalNewItemPresupuesto" type="button"
                                class="btn btn-sm btn-secondary btn-combine">
                            Agregar Item
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>

                    <table id="table_items" class="display w-100"></table>

                    <div class="container-fluid w-100 d-flex flex-column flex-md-row justify-content-end">
                        <button id="btnBorrarItem" type="button" class="btn btn-secondary btn-combine mx-2">
                            Eliminar Item
                            <i class="fa fa-times ms-2"></i>
                        </button>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputSubtotal" class="n-color">Subtotal</label>
                        <div class="input-group mb-3">
                            <label for="inputSubtotal" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" disabled class="form-control form-control-sm form-linear"
                                   id="inputSubtotal"
                                   value="0">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputDescuento" class="n-color">% Descuento</label>
                        <div class="input-group mb-3">
                            <label for="inputDescuento" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="number" class="form-control form-control-sm form-linear" id="inputDescuento"
                                   value="0" min="0" max="100" onkeydown="if(event.key==='.'){event.preventDefault();}"
                                   oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputTotal" class="n-color">Total</label>
                        <div class="input-group mb-3">
                            <label for="inputTotal" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" disabled class="form-control form-control-sm form-linear"
                                   id="inputTotal"
                                   value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarPresupuesto" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Presupuesto View-->
<div class="modal fade" id="modalPresupuestoVer" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalPresupuestoVerLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-fullscreen n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPresupuestoVerLabel">Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formPresupuestoEdit">
                <div class="modal-body">
                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputEditNombrePresupuesto" class="n-color">Nombre del presupuesto</label>
                        <div class="input-group mb-3">
                            <label for="inputSubtotal" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" required class="form-control form-control-sm form-linear"
                                   id="inputEditNombrePresupuesto">
                        </div>
                    </div>

                    <div class="container-fluid w-100 d-flex justify-content-end my-3">
                        <button id="btnModalNewItemPresupuestoVer" type="button"
                                class="btn btn-sm btn-secondary btn-combine">
                            Agregar Item
                            <i class="fa fa-add ms-2"></i>
                        </button>
                    </div>

                    <table id="table_items_ver" class="display w-100"></table>

                    <div class="container-fluid w-100 d-flex flex-column flex-md-row justify-content-end">
                        <button id="btnBorrarItemVer" type="button" class="btn btn-secondary btn-combine mx-2">
                            Eliminar Item
                            <i class="fa fa-times ms-2"></i>
                        </button>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputSubtotalEdit" class="n-color">Subtotal</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" disabled class="form-control form-control-sm form-linear"
                                   id="inputSubtotalEdit"
                                   value="0">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputDescuentoEdit" class="n-color">% Descuento</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="number" min="0" max="100" class="form-control form-control-sm form-linear"
                                   id="inputDescuentoEdit"
                                   onkeydown="if(event.key==='.'){event.preventDefault();}"
                                   oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2 px-4">
                        <label for="inputTotalEdit" class="n-color">Total</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text form-linear">
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </span>
                            <input type="text" disabled class="form-control form-control-sm form-linear"
                                   id="inputTotalEdit"
                                   value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0 d-flex flex-column flex-md-row justify-content-between">
                    <div class="container-fluid col-12 col-md-5 justify-content-start justify-content-md-between">
                        <button id="btn_pdf" type="button" class="btn btn-secondary rounded-pill mx-2">Generar PDF
                        </button>
                        <button id="btn_mail" type="button" class="btn btn-secondary rounded-pill">Enviar Correo
                        </button>
                    </div>
                    <div class="container-fluid col-12 col-md-5 d-flex justify-content-end">
                        <button id="btnUpdatePresupuesto" type="button" class="btn btn-secondary rounded-pill ">Guardar
                            Cambios
                        </button>
                        <button type="button" class="btn btn-secondary rounded-pill mx-2" data-bs-dismiss="modal">Cerrar
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Item Presupuesto-->
<div class="modal fade" id="modalItemPresupuesto" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalItemPresupuestoLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalItemPresupuestoLabel">Agregar Item al Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formItemPresupuesto">

                    <div class="col-12 my-2 px-4">
                        <label for="inputDescripciono" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>

                        <div class="input-group mb-3">
                            <label for="inputDescripciono" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <select id="inputDescripciono" class="form-select flex-grow-1 form-linear" aria-label="Default select example" required>
                            </select>
                        </div>
                    </div>

<!--                    <div class="col-12 my-2 px-4">-->
<!--                        <label for="inputDescripcion" class="n-color">Descripción-->
<!--                            <span class="text-danger fw-bold">(*)</span>-->
<!--                        </label>-->
<!--                        <div class="input-group mb-3">-->
<!--                            <label for="inputDescripcion" class="input-group-text form-linear">-->
<!--                                <i class="fa-solid fa-chevron-right n-color"></i>-->
<!--                            </label>-->
<!--                            <input type="text" class="form-control form-control-sm form-linear" id="inputDescripcion"-->
<!--                                   required>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-12 my-2 px-4">
                        <label for="inputDiente" class="n-color">Diente
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputDiente" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" class="form-control form-control-sm form-linear" id="inputDiente"
                                   required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputObservacion" class="n-color">Observación</label>
                        <div class="input-group mb-3">
                            <label for="inputObservacion" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputObs" id="inputObservacion"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputValor" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputValor" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="number" class="form-control form-control-sm form-linear" id="inputValor"
                                   required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputFecha" class="n-color">Fecha de Pago</label>
                        <div class="input-group mb-3">
                            <label for="inputFecha" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="inputFecha">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                <button id="btnAgregarItemPresupuesto" type="button" class="btn btn-secondary rounded-pill">Agregar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Item Presupuesto Edit-->
<div class="modal fade" id="modalItemPresupuestoVer" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalItemPresupuestoLabelVer"
     aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalItemPresupuestoLabelVer">Agregar Item al Presupuesto</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formItemPresupuestoVer">
                    <div class="col-12 my-2 px-4">
                        <label for="inputDescripcionVer" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputDescripcionVer" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" class="form-control form-control-sm form-linear" id="inputDescripcionVer"
                                   required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputDienteVer" class="n-color">Diente
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputDienteVer" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="text" class="form-control form-control-sm form-linear" id="inputDienteVer"
                                   required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputObservacionVer" class="n-color">Observación</label>
                        <div class="input-group mb-3">
                            <label for="inputObservacionVer" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputObs" id="inputObservacionVer"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-12  my-2 px-4">
                        <label for="inputValorVer" class="n-color">Valor
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputValorVer" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="number" class="form-control form-control-sm form-linear" id="inputValorVer"
                                   required>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="inputFechaVer" class="n-color">Fecha de Pago</label>
                        <div class="input-group mb-3">
                            <label for="inputFechaVer" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="inputFechaVer">
                        </div>
                    </div>

                </form>

            </div>

            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                <button id="btnAgregarItemPresupuestoVer" type="button" class="btn btn-secondary rounded-pill">Agregar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Prestaciones-->
<div class="modal fade " id="modalPrestaciones" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalPrestacionesLabel">Administar Prestaciones
                    <i class="fa fa-file-medical ms-2"></i>
                </h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body w-100 ">
                <div class="col-12 d-flex flex-column flex-sm-row">
                    <button id="btnExportPrestaciones" class="btn btn-sm btn-primary rounded-pill">
                        Exportar prestaciones <i class="fa fa-download ms-2"></i>
                    </button>


                    <label for="filePrestaciones" class="btn btn-sm btn-primary rounded-pill ms-0 ms-sm-2">
                        Importar prestaciones  <i class="fa fa-upload ms-2"></i>
                    </label>

                    <!-- Input de tipo archivo oculto -->
                    <input type="file" id="filePrestaciones" accept=".xlsx" class="d-none" />
                </div>

                <table id="table_prestaciones" class="w-auto row-border order-column compact stripe">
                    <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                </table>

            </div>
            <div class="modal-footer mt-0 col-12">
                <button type="button" class="col-12 col-sm-auto btn btn-sm btn-secondary rounded-pill"
                        data-bs-dismiss="modal">Cerrar <i class="fa fa-close p-0 ms-2"></i></button>
            </div>
        </div>
    </div>
</div>

