var myModalEl = document.getElementById('modalProducto');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);

var myModalElEdit = document.getElementById('modalProductoEdit');
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
            url: $("#formGetProductos").attr("action"),
            dataSrc: 'data'
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'nombre'},
            {data: 'cantidad'},
            {data: 'descripcion'},
            {data: 'fecha_vencimiento'},
            {data: 'idunidad', visible: false},
            {data: 'nombreunidad'},
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function (settings, json) {
            showLoader(false);
        },
    });

    table.on('select', function (e, dt, type, indexes) {

        if (type === 'row') {
            var data = table.rows(indexes).data();
            $('#btnEdit').removeClass('d-none');
        }
    });

    table.on('deselect', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnEdit').addClass('d-none');
        }
    });
});

$('#btnGuardarEdit').click(function (e) {
    if (validateFormEdit()) {
        showLoader(true);

        let in_nombre = $('#inputNombreEdit').val();
        let in_cantidad = $('#inputCantidadEdit').val();
        let in_descripcion = 'NULL';
        let in_fecha = 'NULL';
        let in_unidad = 'NULL';

        if ($('#inputDescripcionEdit').val()) {
            in_descripcion = $('#inputDescripcionEdit').val()
        }

        if ($('#inputFechaEdit').val()) {
            in_fecha = $('#inputFechaEdit').val()
        }

        if ($('#srcUnidadEdit').val()) {
            in_unidad = $('#srcUnidadEdit').val()
        }

        $.ajax({

            url: $("#formProductosEdit").attr("action"),
            type: $("#formProductosEdit").attr("method"),
            data: {
                id: table.rows({selected: true}).data()[0]['id'],
                nombre: in_nombre,
                cantidad: in_cantidad,
                descripcion: in_descripcion,
                fecha: in_fecha,
                unidad: in_unidad
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modalEdit.hide();
                    resetFormEdit();
                    table.ajax.reload();
                    $('#btnEdit').addClass('d-none');
                    sendToast('success', 'Editar Producto', 'Producto modificado exitosamente.');
                } else {
                    sendToast('error', 'Editar Producto', 'Error al modificar Producto.');
                }
            }
        });
    }
});

$('#btnEdit').click(function (e) {
    resetFormEdit();
    selectedData = table.rows({selected: true}).data()[0];

    $('#inputNombreEdit').val(selectedData['nombre']);
    $('#inputCantidadEdit').val(selectedData['cantidad']);
    $('#srcUnidadEdit').val(selectedData['idunidad']);
    $('#inputDescripcionEdit').val(selectedData['descripcion']);
    $('#inputFechaEdit').val(selectedData['fecha_vencimiento']);
    modalEdit.show();
});

$('#btnGuardar').click(function (e) {
    e.preventDefault();
    if (validateForm()) {
        // showLoader(true);

        let in_nombre = $('#inputNombre').val();
        let in_cantidad = $('#inputCantidad').val();
        let in_descripcion = 'NULL';
        let in_fecha = 'NULL';
        let in_unidad = 'NULL';

        if ($('#inputDescripcion').val()) {
            in_descripcion = $('#inputDescripcion').val()
        }

        if ($('#inputFecha').val()) {
            in_fecha = $('#inputFecha').val()
        }

        if ($('#srcUnidad').val()) {
            in_unidad = $('#srcUnidad').val()
        }


        $.ajax({
            url: $("#formProductos").attr("action"),
            type: $("#formProductos").attr("method"),
            data: {
                nombre: in_nombre,
                cantidad: in_cantidad,
                descripcion: in_descripcion,
                fecha: in_fecha,
                unidad: in_unidad
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modal.hide();
                    resetForm();
                    table.ajax.reload();
                    $('#btnEdit').addClass('d-none');
                    sendToast('success', 'Nuevo Producto', 'Producto creado exitosamente.');
                } else {
                    sendToast('error', 'Nuevo Producto', 'Error al crear Producto.');
                }
            }
        });


    } else {
        sendToast('error', 'Error', 'Debe completar todos los campos obligatorios.');
    }

})

function validateForm() {
    let nombre = $('#inputNombre').val();
    let cantidad = $('#inputCantidad').val();
    let unidad = $('#srcUnidad').val();

    if (nombre && cantidad  && unidad) {
        return true;
    } else {
        $('#formProductos').addClass('was-validated');
        return false;
    }

}

function validateFormEdit() {
    let nombre = $('#inputNombreEdit').val();
    let cantidad = $('#inputCantidadEdit').val();
    let unidad = $('#srcUnidadEdit').val();

    if (nombre && cantidad && unidad) {
        return true;
    } else {
        $('#formProductosEdit').addClass('was-validated');
        return false;
    }

}

function resetForm() {
    $('#formProductos').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputCantidad').val('');
    $('#inputDescripcion').val('');
    $('#inputFecha').val('');
    $('#srcUnidad').val('');
}

function resetFormEdit() {
    $('#formProductosEdit').removeClass('was-validated');
    $('#inputNombreEdit').val('');
    $('#inputCantidadEdit').val('');
    $('#srcUnidadEdit').val('');
    $('#inputDescripcionEdit').val('');
    $('#inputFechaEdit').val('');


}
