var table_radiografias;
var archivosSeleccionados = [];
var comentariosTemporales = [];

$(document).ready(function (e) {

    // Inicializar DataTable
    table_radiografias = $('#table_radiografias').DataTable({
        columns: [
            { title: 'Fecha', data: 'fecha' },
            { title: 'Nombre', data: 'nombre' },
            { title: 'Comentario', data: 'comentario' },
            {
                title: 'Opciones', data: 'id_radiografia', render: function (data) {
                    return '<div class="d-flex gap-1">' +
                        '<button class="btn btn-sm btn-outline-secondary btn-ver-radio" data-id="' + data + '"><i class="fa fa-eye"></i></button>' +
                        '<button class="btn btn-sm btn-outline-danger btn-del-radio" data-id="' + data + '"><i class="fa fa-trash"></i></button>' +
                        '</div>';
                }
            },
        ],
        "autoWidth": false,
        "columnDefs": [
            { "width": "15%", "targets": 0 },
            { "width": "25%", "targets": 1 },
            { "width": "40%", "targets": 2 },
            { "width": "20%", "targets": 3, "orderable": false },
        ],
        "order": [[0, 'desc']],
        "bLengthChange": false,
        "bInfo": false,
        "paging": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function (settings, json) {
            showLoader(false);
        },
    });

    initDropZone();

    // Guardar comentarios en tiempo real para evitar pérdida de datos al re-renderizar
    $(document).on('input', '.txt-comentario-radio', function () {
        var index = $(this).data('index');
        comentariosTemporales[index] = $(this).val();
    });
});

/**
 * Inicializa la funcionalidad de la drop zone
 */
function initDropZone() {
    var dropZone = document.getElementById('dropZoneRadiografias');
    var inputFile = document.getElementById('inputRadiografias');

    // El input con opacity:0 ya cubre toda la zona,
    // no necesitamos un click handler adicional en el dropZone.

    // Drag & Drop events
    dropZone.addEventListener('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.add('dropzone-radio--active');
    });

    dropZone.addEventListener('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dropzone-radio--active');
    });

    dropZone.addEventListener('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dropzone-radio--active');

        var files = e.dataTransfer.files;
        procesarArchivos(files);
    });

    // Selección por input
    inputFile.addEventListener('change', function () {
        procesarArchivos(this.files);
    });
}

/**
 * Procesa los archivos seleccionados y muestra la preview
 */
function procesarArchivos(files) {
    var extensionesPermitidas = /(\.jpg|\.jpeg|\.png)$/i;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];

        // Validar extensión
        if (!extensionesPermitidas.exec(file.name)) {
            sendToast('error', 'Radiografías', 'El archivo "' + file.name + '" no tiene un formato válido (.jpg, .png)');
            continue;
        }

        // Validar tamaño (10MB max)
        if (file.size > 10 * 1024 * 1024) {
            sendToast('error', 'Radiografías', 'El archivo "' + file.name + '" excede el límite de 10MB');
            continue;
        }

        archivosSeleccionados.push(file);
        comentariosTemporales.push(''); // Inicializar comentario vacío
    }

    if (archivosSeleccionados.length > 0) {
        mostrarPreview();
    }
}

/**
 * Muestra la preview de archivos seleccionados como thumbnails
 */
function mostrarPreview() {
    var previewContainer = $('#previewRadiografias');
    var listaPreview = $('#listaPreview');
    var countArchivos = $('#countArchivos');

    listaPreview.empty();
    countArchivos.text(archivosSeleccionados.length);

    archivosSeleccionados.forEach(function (file, index) {
        var comentarioActual = comentariosTemporales[index] || '';

        var row = $('<div class="dropzone-radio__file-row mb-3 p-2 border rounded-2 d-flex align-items-center">' +
            '<div class="dropzone-radio__file-row-img me-3"></div>' +
            '<div class="flex-grow-1">' +
            '<small class="text-muted d-block mb-1">' + file.name + '</small>' +
            '<textarea class="form-control form-control-sm txt-comentario-radio" rows="4" placeholder="Comentarios..." data-index="' + index + '">' + comentarioActual + '</textarea>' +
            '</div>' +
            '<button class="btn btn-sm btn-outline-danger btn-remove-file ms-3" data-index="' + index + '">' +
            '<i class="fa fa-trash"></i>' +
            '</button>' +
            '</div>');

        if (file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = (function (rowEl) {
                return function (e) {
                    rowEl.find('.dropzone-radio__file-row-img').css('background-image', 'url(' + e.target.result + ')');
                };
            })(row);
            reader.readAsDataURL(file);
        } else {
            row.find('.dropzone-radio__file-row-img').html('<i class="fas fa-file-medical fa-2x"></i>');
        }

        listaPreview.append(row);
    });

    previewContainer.removeClass('d-none');
    $('#btnSubirRadiografias').removeClass('disabled').prop('disabled', false);
}

/**
 * Elimina un archivo de la lista de preview
 */
$(document).on('click', '.btn-remove-file', function () {
    var index = $(this).data('index');
    archivosSeleccionados.splice(index, 1);
    comentariosTemporales.splice(index, 1); // También eliminar el comentario asociado

    if (archivosSeleccionados.length === 0) {
        ocultarPreview();
    } else {
        mostrarPreview();
    }
});

/**
 * Oculta la preview y limpia la selección
 */
function ocultarPreview() {
    archivosSeleccionados = [];
    comentariosTemporales = []; // Limpiar comentarios
    $('#previewRadiografias').addClass('d-none');
    $('#listaPreview').empty();
    $('#inputRadiografias').val('');
    $('#btnSubirRadiografias').addClass('disabled').prop('disabled', true);
}

/**
 * Cancelar selección
 */
$('#btnCancelRadiografias').click(function () {
    ocultarPreview();
});

/**
 * Subir radiografías al servidor
 */
$('#btnSubirRadiografias').click(function () {

    if (archivosSeleccionados.length === 0) {
        sendToast('error', 'Radiografías', 'No hay archivos seleccionados');
        return;
    }

    var formData = new FormData();
    formData.append('paciente', $('#srcPaciente').val());
    formData.append('usuario', $('#srcUser').val());

    archivosSeleccionados.forEach(function (file, index) {
        formData.append('radiografias[]', file);
        formData.append('comentarios[]', comentariosTemporales[index]);
    });

    showLoader(true);

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaSetRadiografia',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (respuesta) {
            showLoader(false);

            if (respuesta == 'true') {
                sendToast('success', 'Radiografías', 'Radiografías subidas correctamente');
                ocultarPreview();
                $('#modalRadiografias').modal('hide');
                cargaDataRadiografias();
            } else {
                sendToast('error', 'Radiografías', 'Error al subir radiografías');
            }
        },
        error: function () {
            showLoader(false);
            sendToast('error', 'Radiografías', 'Error de conexión al subir radiografías');
        }
    });
});

/**
 * Carga las radiografías del paciente desde el servidor
 */
function cargaDataRadiografias() {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetRadiografias',
        type: 'POST',
        data: {
            paciente: $("#srcPaciente").val()
        },
        success: function (respuesta) {
            showLoader(false);

            var res = JSON.parse(respuesta);

            table_radiografias.clear().draw();
            table_radiografias.rows.add(res).draw();
        },
        error: function () {
            showLoader(false);
            sendToast('error', 'Radiografías', 'Error al cargar radiografías');
        }
    });
}

/**
 * Ver radiografía
 */
$(document).on('click', '.btn-ver-radio', function () {
    var id = $(this).data('id');

    showLoader(true);

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetRadiografia',
        type: 'POST',
        data: {
            id_radiografia: id
        },
        success: function (respuesta) {
            showLoader(false);

            var res = JSON.parse(respuesta);

            // Abrir imagen en nueva pestaña
            if (res.url) {
                window.open(res.url, '_blank');
            }
        },
        error: function () {
            showLoader(false);
            sendToast('error', 'Radiografías', 'Error al cargar la radiografía');
        }
    });
});

/**
 * Eliminar radiografía
 */
$(document).on('click', '.btn-del-radio', function () {
    var id = $(this).data('id');

    if (!confirm('¿Está seguro de eliminar esta radiografía?')) return;

    showLoader(true);

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaDelRadiografia',
        type: 'POST',
        data: {
            id_radiografia: id
        },
        success: function (respuesta) {
            showLoader(false);

            if (respuesta == 'true') {
                sendToast('success', 'Radiografías', 'Radiografía eliminada correctamente');
                cargaDataRadiografias();
            } else {
                sendToast('error', 'Radiografías', 'Error al eliminar radiografía');
            }
        },
        error: function () {
            showLoader(false);
            sendToast('error', 'Radiografías', 'Error de conexión');
        }
    });
});
