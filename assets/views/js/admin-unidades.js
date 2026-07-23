var myModalEl = document.getElementById('modalUnidad');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);

var myModalElEdit = document.getElementById('modalUnidadEdit');
var modalEdit = bootstrap.Modal.getOrCreateInstance(myModalElEdit);

const toast = new bootstrap.Toast(document.getElementById('customToast'));
var table;

$(document).ready(function (e) {
    myModalEl.addEventListener('show.bs.modal', event => {
        resetForm();
    });

    table = $('#table_id').DataTable({
        select: {
            style: 'single'
        },
        ajax: {
            url: $("#formGetUnidades").attr("action"),
            dataSrc: 'data'
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'nombre'},
            {data: 'activo'},
            {data: 'activoid', visible: false},
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function( settings, json ) {
            showLoader(false);
        },
    });

    table.on( 'select', function ( e, dt, type, indexes ) {

        if ( type === 'row' ) {
            var data = table.rows( indexes ).data();
            $('#btnEdit').removeClass('d-none');
        }
    } );

    table.on( 'deselect', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            $('#btnEdit').addClass('d-none');
        }
    } );



});

$('#btnGuardarEditar').click(function (e) {
    if (validateFormEdit()) {
        showLoader(true);

        $.ajax({

            url: $("#formUnidadEdit").attr("action"),
            type: $("#formUnidadEdit").attr("method"),
            data: {
                id: table.rows( { selected: true } ).data()[0]['id'],
                nombre: $('#inputNombreEdit').val(),
                bloqueada: $('#srcEstadoEdit').val(),
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modalEdit.hide();
                    resetFormEdit();
                    table.ajax.reload();
                    sendToast('success', 'Editar Unidad', 'Unidad modificada exitosamente.');
                } else {
                    sendToast('error', 'Editar Unidad', 'Error al modificar Unidad.');
                }
            }
        });
    }
});

$('#btnEdit').click(function (e) {
    resetFormEdit();
    selectedData = table.rows( { selected: true } ).data()[0];
    $('#inputNombreEdit').val(selectedData['nombre']);
    $('#srcEstadoEdit').val(selectedData['activoid']);
    modalEdit.show();
});

$('#btnGuardar').click(function (e) {
    e.preventDefault();
    if (validateForm()) {
        showLoader(true);

        $.ajax({

            url: $("#formUnidad").attr("action"),
            type: $("#formUnidad").attr("method"),
            data: {
                nombre: $('#inputNombre').val()
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modal.hide();
                    resetForm();
                    table.ajax.reload();
                    sendToast('success', 'Nueva Unidad', 'Unidad creada exitosamente.');
                } else {
                    sendToast('error', 'Nueva Unidad', 'Error al crear Unidad.');
                }
            }
        });


    } else {
        sendToast('error', 'Error', 'Debe completar todos los campos obligatorios.');
    }

})

function validateForm() {
    let nombre = $('#inputNombre').val();

    if (nombre ) {
        return true;
    } else {
        $('#formUnidad').addClass('was-validated');
        return false;
    }

}

function validateFormEdit() {
    let nombre = $('#inputNombreEdit').val();
    let estado = $('#srcEstadoEdit').val();

    if (nombre && estado) {
        return true;
    } else {
        $('#formUnidadEdit').addClass('was-validated');
        return false;
    }

}

function resetForm() {
    $('#formUnidad').removeClass('was-validated');
    $('#inputNombre').val('');
}

function resetFormEdit() {
    $('#formUnidadEdit').removeClass('was-validated');
    $('#inputNombreEdit').val('');
    $('#srcEstadoEdit').val('');
}
