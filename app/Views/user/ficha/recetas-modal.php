<!-- Modal Recetas-->
<div class="modal fade" id="modalReceta" tabindex="-1" aria-labelledby="modalRecetaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalRecetaLabel">Crear Receta</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="col-12 ">
                <div id="editorRecetas" class="editorContainer"></div>
            </div>

            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar
                </button>
                <button id="btnGuardarReceta" type="button" class="btn btn-sm btn-secondary rounded-pill">Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Recetas-->
<div class="modal fade" id="modalViewReceta" tabindex="-1" aria-labelledby="modalViewRecetaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalViewRecetaLabel">Revisión Receta médica</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="col-12 ">
                <div id="editorViewRecetas" class="editorContainer"></div>
            </div>
            <div class="modal-footer mt-0 d-flex align-items-start justify-content-between flex-row col-12">
                <div class="col-12 col-sm-5 d-flex flex-column flex-md-row justify-content-around align-items-start">
                    <button id="btnPrintReceta" type="button" class=" mt-2 mt-sm-0 col-12 col-md-auto btn btn-sm btn-secondary rounded-pill">Imprimir
                    </button>
                    <button id="btnSendReceta" type="button" class=" mt-2 mt-sm-0 col-12 col-md-auto btn btn-sm btn-secondary rounded-pill">Enviar
                    </button>
                </div>
                <div class="col-12 col-sm-5 d-flex flex-column flex-md-row justify-content-around align-items-end">
                    <button type="button" class=" mt-2 mt-sm-0 col-12 col-md-auto btn btn-sm btn-secondary rounded-pill" data-bs-dismiss="modal">Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

