<div id="consentimiento" class="container-fluid col-12 ficha-container">
    <fieldset class="mb-4 px-0 px-md-4">
        <legend class="n-color">Consentimiento Informado para Odontología</legend>

        <!-- ACCIONES SUPERIORES -->
        <div class="row mb-3 mt-2">
            <div class="col-12 text-end">
                <button type="button" class="btn btn-secondary btn-combine rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#modalConsentimiento" id="btnNuevoConsen">
                    <i class="fas fa-plus-circle me-1"></i> Agregar Consentimiento
                </button>
            </div>
        </div>

        <!-- LISTADO DE CONSENTIMIENTOS -->
        <div class="table-responsive bg-white border rounded shadow-sm">
            <table class="table table-hover align-middle mb-0" id="tblConsentimientos">
                <thead class="bg-light text-muted fw-bold small text-uppercase">
                    <tr>
                        <th class="ps-4" width="10%">ID</th>
                        <th width="30%">Fecha de Firma</th>
                        <th width="40%">Resumen de Tratamiento</th>
                        <th class="text-center" width="20%">Acciones</th>
                    </tr>
                </thead>
                <tbody id="listaConsentimientos">
                    <!-- Dinámico por JS -->
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fas fa-info-circle me-1"></i> No hay consentimientos registrados para este paciente.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </fieldset>
</div>
