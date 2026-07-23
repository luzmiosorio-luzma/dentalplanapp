var myModalEl = document.getElementById('modalUsuario');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);

var myModalElEdit = document.getElementById('modalUsuarioEdit');
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
            url: $("#formGetUsuarios").attr("action"),
            dataSrc: 'data'
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'nombre'},
            {data: 'email'},
            {data: 'role'},
            {data: 'roleid', visible: false},
            {data: 'activo'},
            {data: 'activoid', visible: false},
        ],
        "bLengthChange": false,
        "bInfo":false,
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

            url: $("#formUsuarioEdit").attr("action"),
            type: $("#formUsuarioEdit").attr("method"),
            data: {
                id: table.rows( { selected: true } ).data()[0]['id'],
                nombre: $('#inputNombreEdit').val(),
                email: $('#inputEmailEdit').val(),
                rol: $('#srcRolEdit').val(),
                estado: $('#srcEstadoEdit').val(),
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modalEdit.hide();
                    resetFormEdit();
                    table.ajax.reload();
                    sendToast('success', 'Editar Usuario', 'Usuario modificado exitosamente.');
                }
                else if (respuesta == 'Correo ya registrado') {
                    sendToast('error', 'Nuevo Usuario', 'El correo utilizado ya existe.');
                }
                else {
                    sendToast('error', 'Editar Usuario', 'Error al modificar usuario.');
                }
            }
        });
    }
});

$('#btnEdit').click(function (e) {
    resetFormEdit();
    selectedData = table.rows( { selected: true } ).data()[0];
    $('#inputNombreEdit').val(selectedData['nombre']);
    $('#inputEmailEdit').val(selectedData['email']);
    $('#srcRolEdit').val(selectedData['roleid']);
    $('#srcEstadoEdit').val(selectedData['activoid']);
    modalEdit.show();
});

$('#btnGuardar').click(function (e) {
    e.preventDefault();
    if (validateForm()) {
        showLoader(true);

        $.ajax({

            url: $("#formUsuario").attr("action"),
            type: $("#formUsuario").attr("method"),
            data: {
                nombre: $('#inputNombre').val(),
                email: $('#inputEmail').val(),
                password: $('#inputPassword').val(),
                rol: $('#srcRol').val(),
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modal.hide();
                    resetForm();
                    table.ajax.reload();
                    sendToast('success', 'Nuevo Usuario', 'Usuario creado exitosamente.');
                }
                else if (respuesta == 'Correo ya registrado') {
                    sendToast('error', 'Nuevo Usuario', 'El correo utilizado ya existe.');
                }
                else {
                    sendToast('error', 'Nuevo Usuario', 'Error al crear usuario.');
                }
            }
        });


    } else {
        sendToast('error', 'Error', 'Debe completar todos los campos obligatorios.');
    }

})

function validateForm() {
    let nombre = $('#inputNombre').val();
    let email = $('#inputEmail').val();
    let password = $('#inputPassword').val();
    let rol = $('#srcRol').val();

    if (nombre && email && password && rol) {
        return true;
    } else {
        $('#formUsuario').addClass('was-validated');
        return false;
    }

}

function validateFormEdit() {
    let nombre = $('#inputNombreEdit').val();
    let email = $('#inputEmailEdit').val();
    let rol = $('#srcRolEdit').val();
    let estado = $('#srcEstadoEdit').val();

    if (nombre && email && rol && estado) {
        return true;
    } else {
        $('#formUsuarioEdit').addClass('was-validated');
        return false;
    }

}

function resetForm() {
    $('#formUsuario').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputEmail').val('');
    $('#inputPassword').val('');
    $('#srcRol').val('');
}

function resetFormEdit() {
    $('#formUsuarioEdit').removeClass('was-validated');
    $('#inputNombreEdit').val('');
    $('#inputEmailEdit').val('');
    $('#srcRolEdit').val('');
    $('#srcEstadoEdit').val('');
}
