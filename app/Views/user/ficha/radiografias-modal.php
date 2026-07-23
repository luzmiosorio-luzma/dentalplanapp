<!-- Modal Radiografías -->
<div class="modal fade" id="modalRadiografias" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalRadiografiasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalRadiografiasLabel">Subir Radiografías</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Drop Zone -->
                <div class="col-12 mb-3">
                    <div id="dropZoneRadiografias" class="dropzone-radio">
                        <div class="dropzone-radio__content">
                            <i class="fas fa-cloud-upload-alt dropzone-radio__icon"></i>
                            <p class="dropzone-radio__text mb-1">Arrastra y suelta las radiografías aquí</p>
                            <p class="dropzone-radio__subtext mb-2">o haz clic para seleccionar archivos</p>
                            <span class="badge bg-secondary">JPG, PNG — Máx. 10MB por archivo</span>
                        </div>
                        <input type="file" id="inputRadiografias" multiple accept=".jpg,.jpeg,.png" class="dropzone-radio__input">
                    </div>

                    <!-- Preview de archivos seleccionados -->
                    <div id="previewRadiografias" class="dropzone-radio__preview d-none mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted"><span id="countArchivos">0</span> archivo(s) seleccionado(s)</small>
                        </div>
                        <div id="listaPreview" class="dropzone-radio__file-list"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal" id="btnCancelRadiografias">Cancelar</button>
                <button type="button" class="btn btn-secondary btn-combine rounded-pill disabled" id="btnSubirRadiografias">
                    <i class="fa fa-upload me-1"></i> Subir
                </button>
            </div>
        </div>
    </div>
</div>
