const toast = new bootstrap.Toast(document.getElementById('customToast'));
let elModalAddNovedad = document.getElementById('modalAddNovedad');
let modalAddNovedad = bootstrap.Modal.getOrCreateInstance(elModalAddNovedad);

let elModalEditNovedad = document.getElementById('modalEditNovedad');
let modalEditNovedad = bootstrap.Modal.getOrCreateInstance(elModalEditNovedad);

let baseUrl = document.getElementById('baseUrl').value;
var table;

$(document).ready(function (e) {


    table = $('#table_novedades').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'idnovedad', visible: false},
            {data: 'titulo'},
            {data: 'url'},
            {data: 'activo'},
            {data: 'fecha'},
        ],
        "bLengthChange": false,
        "bInfo": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function (settings, json) {
            showLoader(false);
        },
    });

    table.on('select', function (e, dt, type, indexes) {
        $('#btnEditNovedad').removeClass('disabled');
    });

    table.on('deselect', function (e, dt, type, indexes) {
        $('#btnEditNovedad').addClass('disabled');
    });

    $('label[for="fecha_expiracion"], #fecha_expiracion').on('click', function () {
        $('#fecha_expiracion').focus();
    });

    obtenerNovedades()

});

$('#btnEditNovedad').on('click', function () {
    selectedData = table.rows( { selected: true } ).data()[0];
    $('#inputEditTitulo').val(selectedData.titulo);
    $('#inputEditEstado').val(selectedData.data_estado);
    $('#inputEditFecha').val(selectedData.fecha)
    modalEditNovedad.show()
})


$('#btnGuardarEditNovedad').click(function (e) {
    e.preventDefault();
    if (validaEditNovedad()) {
        guardarEditNovedad();
    }
});

$('#btnAddNovedad').click(function () {
    resetFormAddNovedad()
    modalAddNovedad.show();
})

$('#btnGuardarNovedad').click(function (e) {
    e.preventDefault();

    if (validaAddNovedad()) {
        guardarNovedad();
    }
})


function guardarEditNovedad() {
    showLoader(true)

    var formData = new FormData();
    let id = table.rows( { selected: true } ).data()[0]['idnovedad'];
    let file = $('#inputEditImagen')[0].files[0];
    let titulo = $('#inputEditTitulo').val();
    let estado = $('#inputEditEstado').val();
    let fecha = $('#inputEditFecha').val();

    formData.append('idnovedad', id);
    formData.append('titulo', titulo);
    formData.append('estado', estado);
    formData.append('fecha', fecha);

    if (file) {
        formData.append('file', file);
    }

    $.ajax({
        url: baseUrl + '/AdminNovedades/putEditAdminNovedad',
        type: 'POST',
        data: formData,
        processData: false, // Evita el procesamiento automático del formulario
        contentType: false, // Necesario para enviar archivos
    }).done(function (result) {
        sendToast('success', 'Novedades', 'Novedad editada exitosamente')
        $('#btnEditNovedad').addClass('disabled');
        modalEditNovedad.hide()
        obtenerNovedades();
    })
}

function validaEditNovedad() {
    let titulo = $('#inputEditTitulo').val();
    let estado = $('#inputEditEstado').val();

    if (!titulo || !estado) {
        sendToast('error', 'Error', 'Todos los campos son obligatorios');
        $('#formEditNovedad').addClass('was-validated');
        return false;
    }

    return true;
}

function guardarNovedad() {
    showLoader(true)

    var formData = new FormData();
    let titulo = $('#inputTitulo').val();
    let file = $('#inputImagen')[0].files[0];
    let fecha = $('#inputFecha').val();

    formData.append('titulo', titulo);
    formData.append('file', file);
    formData.append('fecha', fecha);

    $.ajax({
        url: baseUrl + '/AdminNovedades/putAdminNovedad',
        type: 'POST',
        data: formData,
        processData: false, // Evita el procesamiento automático del formulario
        contentType: false, // Necesario para enviar archivos
    }).done(function (result) {
        sendToast('success', 'Novedades', 'Novedad agregada exitosamente')
        modalAddNovedad.hide()
        obtenerNovedades();
    })
}

function validaAddNovedad() {
    let titulo = $('#inputTitulo').val();
    let imagen = $('#inputImagen')[0].files[0]; // Captura el archivo seleccionado

    // Verificar campos vacíos
    if (!titulo || !imagen) {
        sendToast('error', 'Error', 'Complete los campos obligatorios');
        $('#formAddNovedad').addClass('was-validated');
        return false;
    }

    // Validar extensión del archivo
    let allowedExtensions = ['jpg', 'jpeg', 'png'];
    let fileExtension = imagen.name.split('.').pop().toLowerCase();

    if (!allowedExtensions.includes(fileExtension)) {
        sendToast('error', 'Error', 'Solo se permiten archivos JPG y PNG');
        $('#formAddNovedad').addClass('was-validated');
        return false;
    }

    // Si pasa todas las validaciones
    return true;
}

function resetFormAddNovedad() {
    $('#inputTitulo').val('');
    $('#inputImagen').val('');
    $('#inputFecha').val('');
    $('#formAddNovedad').removeClass('was-validated');
}

function obtenerNovedades() {
    showLoader(true)
    $.ajax({
        url: baseUrl + '/AdminNovedades/getAdminNovedades',
    }).done(function (result) {

        res = JSON.parse(result);
        table.clear().draw();
        table.rows.add(res.data).draw();

        showLoader(false)

    })

}