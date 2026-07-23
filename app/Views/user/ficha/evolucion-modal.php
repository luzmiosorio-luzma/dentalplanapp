
<!-- Modal Evolucion-->
<div class="modal fade" id="modalEvolucion" tabindex="-1" aria-labelledby="modalEvolucionLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalEvolucionLabel">Ingresar Registro Evolución Clínica</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="formEvolucion" action="<?php echo site_url('UserPaciente/fichaSetEvolucion'); ?>"
                  method="post">

                <div class="modal-body">

                    <div class="col-12 my-2 px-4">
                        <label for="inputEvolucion" class="n-color">Descripción
                            <span class="text-danger fw-bold">(*)</span>
                        </label>
                        <div class="input-group mb-3">
                            <label for="inputEvolucion" class="input-group-text form-linear" >
                                <i class="fa-solid fa-chevron-right n-color"></i>
                            </label>
                            <textarea class="form-control h-auto form-linear" name="inputEvolucion" id="inputEvolucion"
                                      rows="5" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                    </button>
                    <button id="btnGuardarEvolucion" type="button" class="btn btn-secondary rounded-pill">Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
