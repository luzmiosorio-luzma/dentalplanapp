let signaturePad;

$(document).ready(function () {
    const canvas = document.getElementById('signature-pad');
    if (canvas) {
        signaturePad = new SignaturePad(canvas, {
            minWidth: 0.5,
            maxWidth: 2.5,
            penColor: "black",
            backgroundColor: "rgba(0,0,0,0)"
        });
    }

    $('#clearSignature').click(function () {
        signaturePad.clear();
    });

    $('#btnGuardarConsentimiento').click(function () {
        guardarConsentimiento();
    });

    // Resetear al abrir modal
    const modalConsen = document.getElementById('modalConsentimiento');
    if (modalConsen) {
        modalConsen.addEventListener('shown.bs.modal', function () {
            resizeCanvas();
            $('#consenNroPresupuesto').val('');
            $('#consenDetalle').val('');

            // Cargar datos pre-establecidos SIEMPRE al abrir modal
            const pacienteId = $('#srcPaciente').val();
            $.ajax({
                url: baseUrl + '/UserPaciente/getConsentPreData',
                type: 'POST',
                data: { paciente: pacienteId },
                success: function (response) {
                    const preData = JSON.parse(response);
                    $('#lblNombrePacienteConsen').text(preData.paciente_nombre);
                    $('#consenNombreDoctor').val(preData.usuario_nombre);
                    
                    if (preData.usuario_firma) {
                        $('#imgFirmaDoctorConsen').attr('src', preData.usuario_firma).show();
                    } else {
                        $('#imgFirmaDoctorConsen').hide();
                    }
                }
            });
        });
    }
});

function resizeCanvas() {
    const canvas = document.getElementById('signature-pad');
    if (!canvas) return;
    
    const ratio = Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    signaturePad.clear();
}

function cargaDataConsentimiento() {
    console.log("Cargando lista de consentimientos...");
    const pacienteId = $('#srcPaciente').val();
    const usuarioId = $('#srcUser').val();
    const listaTable = $('#listaConsentimientos');

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetConsentimiento',
        type: 'POST',
        data: { 
            paciente: pacienteId,
            usuario: usuarioId
        },
        success: function (response) {
            listaTable.empty();
            if (response != "false") {
                const dataArray = JSON.parse(response);
                
                // Mapear cada consentimiento en la tabla
                dataArray.forEach(function(consen) {
                    let row = `
                        <tr class="fw-medium">
                            <td class="ps-4 text-muted small">#${consen.id_consentimiento}</td>
                            <td class="n-color">${consen.fecha_formateada}</td>
                            <td class="text-secondary small italic text-truncate" style="max-width: 250px;">
                               <strong>NP ${consen.presupuesto_nro}:</strong> ${consen.detalle}
                            </td>
                            <td class="text-center">
                                <div class="btn-group shadow-sm rounded-pill overflow-hidden border bg-white">
                                    <button type="button" class="btn btn-white btn-sm px-3" title="Ver PDF" onclick="verPdfConsentimiento(${consen.id_consentimiento})">
                                        <i class="fas fa-file-pdf text-danger"></i>
                                    </button>
                                    <button type="button" class="btn btn-white btn-sm px-3" title="Eliminar" onclick="eliminarConsentimiento(${consen.id_consentimiento})">
                                        <i class="fas fa-trash-alt text-muted"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    listaTable.append(row);
                });
            } else {
                listaTable.append(`
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted bg-light-soft">
                            <i class="fas fa-file-circle-minus fa-2x mb-2 d-block opacity-50"></i>
                            Actualmente no hay consentimientos firmados para este paciente.
                        </td>
                    </tr>
                `);
            }
        }
    });
}

function verPdfConsentimiento(idConsentimiento) {
    window.open(baseUrl + '/UserPaciente/fichaGetConsentimientoPdf?id=' + idConsentimiento, '_blank');
}

function guardarConsentimiento() {
    if (signaturePad.isEmpty()) {
        sendToast('error', 'Validación', 'Por favor, el paciente debe firmar el documento.');
        return;
    }

    const nroPresupuesto = $('#consenNroPresupuesto').val();
    const detalle = $('#consenDetalle').val();
    const nombreDoctor = $('#consenNombreDoctor').val();

    if (!nroPresupuesto || !detalle || !nombreDoctor) {
        sendToast('error', 'Validación', 'Por favor, complete todos los campos requeridos.');
        return;
    }

    const firmaBase64 = signaturePad.toDataURL(); 
    const pacienteId = $('#srcPaciente').val();
    const usuarioId = $('#srcUser').val();

    showLoader(true);
    $.ajax({
        url: baseUrl + '/UserPaciente/fichaSetConsentimiento',
        type: 'POST',
        data: {
            paciente: pacienteId,
            usuario: usuarioId,
            nro_presupuesto: nroPresupuesto,
            detalle: detalle,
            nombre_doctor: nombreDoctor,
            firma: firmaBase64
        },
        success: function (response) {
            showLoader(false);
            if (response == "true") {
                sendToast('success', 'Éxito', 'Consentimiento guardado correctamente.');
                const modal = bootstrap.Modal.getInstance(document.getElementById('modalConsentimiento'));
                modal.hide();
                cargaDataConsentimiento(); 
            } else {
                sendToast('error', 'Error', 'No se pudo guardar el consentimiento.');
            }
        }
    });
}

function eliminarConsentimiento(idConsentimiento) {
    if (!confirm("¿Está seguro de que desea eliminar este consentimiento? Esta acción es irreversible.")) return;
    
    showLoader(true);
    $.ajax({
        url: baseUrl + '/UserPaciente/fichaDelConsentimiento',
        type: 'POST',
        data: {
            id: idConsentimiento
        },
        success: function (response) {
            showLoader(false);
            if (response == "true") {
                sendToast('success', 'Eliminado', 'Consentimiento eliminado con éxito.');
                cargaDataConsentimiento();
            } else {
                sendToast('error', 'Error', 'No se pudo eliminar el documento.');
            }
        }
    });
}
