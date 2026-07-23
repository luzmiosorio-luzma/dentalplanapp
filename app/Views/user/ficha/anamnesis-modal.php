<!-- Modal Anamnesis Uno-->
<div class="modal fade" id="modalAnamnesisUno" tabindex="-1" aria-labelledby="modalAnamnesisUnoLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">

            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisUnoLabel">Motivo de consulta y Enf Actual. | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <form id="formAnamUno" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">

                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamUno" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamUno" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamUno" id="inputAnamUno"
                                      rows="5" required></textarea>
                        </div>
                    </div>

                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamUno" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamUno" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamUno" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamUno" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Dos-->
<div class="modal fade" id="modalAnamnesisDos" tabindex="-1" aria-labelledby="modalAnamnesisDosLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisDosLabel">Antecedentes médicos personales | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamDos" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamDos" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamDos" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamDos" id="inputAnamDos"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamDos" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamDos" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamDos" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamDos" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Tres-->
<div class="modal fade" id="modalAnamnesisTres" tabindex="-1" aria-labelledby="modalAnamnesisTresLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisTresLabel">Antecedentes médicos familiares | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamTres" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamTres" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamTres" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamTres" id="inputAnamTres"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamTres" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamTres" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamTres" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamTres" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Cuatro-->
<div class="modal fade" id="modalAnamnesisCuatro" tabindex="-1" aria-labelledby="modalAnamnesisCuatroLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisCuatroLabel">Antecedentes odontológicos | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamCuatro" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamCuatro" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamCuatro" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamCuatro"
                                      id="inputAnamCuatro"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamCuatro" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamCuatro" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamCuatro"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamCuatro" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Cinco-->
<div class="modal fade" id="modalAnamnesisCinco" tabindex="-1" aria-labelledby="modalAnamnesisCincoLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisCincoLabel">Examen extraoral | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamCinco" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamCinco" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamCinco" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamCinco" id="inputAnamCinco"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamCinco" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamCinco" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamCinco" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamCinco" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Seis-->
<div class="modal fade" id="modalAnamnesisSeis" tabindex="-1" aria-labelledby="modalAnamnesisSeisLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisSeisLabel">Examen intraoral | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamSeis" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamSeis" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamSeis" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamSeis" id="inputAnamSeis"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamSeis" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamSeis" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamSeis" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamSeis" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Siete-->
<div class="modal fade" id="modalAnamnesisSiete" tabindex="-1" aria-labelledby="modalAnamnesisSieteLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisSieteLabel">Examen de la oclusión | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamSiete" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamSiete" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamSiete" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamSiete" id="inputAnamSiete"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamSiete" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamSiete" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamSiete" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamSiete" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Ocho-->
<div class="modal fade" id="modalAnamnesisOcho" tabindex="-1" aria-labelledby="modalAnamnesisOchoLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisOchoLabel">Examen radiográfico | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamOcho" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamOcho" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamOcho" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamOcho" id="inputAnamOcho"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamOcho" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamOcho" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamOcho" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamOcho" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Anamnesis Nueve-->
<div class="modal fade" id="modalAnamnesisNueve" tabindex="-1" aria-labelledby="modalAnamnesisNueveLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalAnamnesisNueveLabel">Diagnostico | Ingresar
                    registro</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formAnamNueve" action="<?php echo site_url('UserPaciente/fichaSetAnamnesisDetalle'); ?>"
                  method="post">
                <div class="modal-body">
                    <div class="col-12 my-2 px-4">
                        <label for="inputAnamNueve" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3 input-container">
                            <label for="inputAnamNueve" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputAnamNueve" id="inputAnamNueve"
                                      rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2 px-4">
                        <label for="fechaAnamNueve" class="n-color">Fecha
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="fechaAnamNueve" class="input-group-text form-linear">
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <input type="date" class="form-control datepicker form-linear" id="fechaAnamNueve" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarAnamNueve" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

