let baseUrl = $('#hdnBaseUrl').val();
var myModalEl = document.getElementById('modalPresupuesto');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);
let selectedItemIndex, selectedPresupuestoIndex;

var myModalItem = document.getElementById('modalItem');
var modalItem = bootstrap.Modal.getOrCreateInstance(myModalItem);

var myModalItemEdit = document.getElementById('modalItemEdit');
var modalItemEdit = bootstrap.Modal.getOrCreateInstance(myModalItemEdit);

var myModalPresupuestoEdit = document.getElementById('modalPresupuestoEdit');
var modalPresupuestoEdit = bootstrap.Modal.getOrCreateInstance(myModalPresupuestoEdit);

const toast = new bootstrap.Toast(document.getElementById('customToast'));
var table, table_items, table_items_edit;

var dataSet = [
    // {
    //     "descripcion": "descripcion",
    //     "diente": "diente",
    //     "observaciones": "observaciones",
    //     "total": "total",
    //     "desarrollo": "desarrollo",
    //     "estado_pago": "estado_pago",
    //     "fecha_pago": "fecha_pago"
    // },
    // {
    //     "descripcion": "descripcion2",
    //     "diente": "diente2",
    //     "observaciones": "observaciones2",
    //     "total": "total2",
    //     "desarrollo": "desarrollo2",
    //     "estado_pago": "estado_pago2",
    //     "fecha_pago": "fecha_pago2"
    // }
];

$(document).ready(function (e) {
    myModalEl.addEventListener('show.bs.modal', event => {
        resetForm();
    });

    table = $('#table_presupuesto').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'idpresupuesto', visible: false},
            {data: 'nombre_pcte'},
            {data: 'fecha'}
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

    table_items = $('#table_items').DataTable({
        data: dataSet,
        columns: [
            {title: 'Descripcion', data: 'descripcion'},
            {title: 'Diente', data: 'diente'},
            {title: 'Observaciones', data: 'observaciones'},
            {title: 'Valor', data: 'valor'},
            {title: 'Desarrollo Tratamiento', data: 'desarrollo'},
            {title: 'Estado Pago', data: 'estado_pago'},
            {title: 'Fecha Pago', data: 'fecha_pago'}
        ],
        "bLengthChange": false,
        "bInfo": false,
        "bFilter": false,
        "bPaginate": false,
        "language": {
            "emptyTable": "No hay Items de Presupuesto",
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        select: {
            style: 'single'
        },
    });

    table_items_edit = $('#table_items_edit').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {title: 'iditem_presupuesto', data: 'iditem_presupuesto', visible: false},
            {title: 'Descripcion', data: 'descripcion'},
            {title: 'Diente', data: 'diente'},
            {title: 'Observaciones', data: 'observacion'},
            {title: 'Valor', data: 'valor'},
            {title: 'Desarrollo Tratamiento', data: 'desarrollo'},
            {title: 'Estado Pago', data: 'estado_pago'},
            {title: 'Fecha Pago', data: 'fecha_pago'}
        ],
        "bLengthChange": false,
        "bInfo": false,
        "bFilter": false,
        "bPaginate": false,
        "language": {
            "emptyTable": "No hay Items de Presupuesto",
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        }
    });

    table.on('select', function (e, dt, type, indexes) {
        if (type === 'row') {
            var data = table.rows(indexes).data();
            $('#btnMore').removeClass('d-none');
        }
    });

    table.on('deselect', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnMore').addClass('d-none');
        }
    });

    table_items.on('select', function (e, dt, type, indexes) {
        if (type === 'row') {
            selectedItemIndex = indexes[0]
            $('#btnEditItem').removeClass('d-none');
            $('#btnBorrarItem').removeClass('d-none');
        }
    });

    table_items.on('deselect', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnEditItem').addClass('d-none');
            $('#btnBorrarItem').addClass('d-none');
        }
    });


    // tableTareas.on('select', function (e, dt, type, indexes) {
    //     if (type === 'row') {
    //         var data = table.rows(indexes).data();
    //         $('#btnTareaEdit').removeClass('d-none');
    //     }
    // });
    //
    // tableTareas.on('deselect', function (e, dt, type, indexes) {
    //     if (type === 'row') {
    //         $('#btnTareaEdit').addClass('d-none');
    //     }
    // });

    showLoader(false);
});

// $('#btn-test').click(function (e) {
//     item = {
//         "descripcion": "descripcion3",
//         "diente": "diente3",
//         "observaciones": "observaciones3",
//         "total": "total3",
//         "desarrollo": "desarrollo3",
//         "estado_pago": "estado_pago3",
//         "fecha_pago": "fecha_pago3"
//     };
//
//     dataSet.push(item);
//     table_items.clear().draw();
//     table_items.rows.add(dataSet).draw();
// });

$('#btnMore').click(function (e) {

    let selectedData = table.rows({selected: true}).data()[0];
    idPresupuesto = selectedData.idpresupuesto;

    $.ajax({
        url: baseUrl + '/AdminPresupuesto/getDataPresupuesto',
        type: 'POST',
        data: {
            idPresupuesto: idPresupuesto,
        },
        success: function (result) {
            res = JSON.parse(result);

            console.log(res)
            let presupuesto = res.presupuesto[0];

            $('#inputNombreEdit').val(presupuesto.nombre_pcte)
            $('#inputFonoEdit').val(presupuesto.fono_pcte)
            $('#inputCorreoEdit').val(presupuesto.correo_pcte)

            table_items_edit.clear().draw();
            table_items_edit.rows.add(res.items).draw();

            let total = parseInt(res.subtotal) + parseInt(presupuesto.descuento);
            $('#inputSubtotalEdit').val(res.subtotal);
            $('#inputTotalEdit').val(total);


            showLoader(false);
            modalPresupuestoEdit.show();
        }
    });


})

$('#btnBorrarItem').click(function (e) {
    dataSet.splice(selectedItemIndex, 1);
    table_items.clear().draw();
    table_items.rows.add(dataSet).draw();
    updateSubtotal();
    sendToast('secondary', 'Eliminar Item', 'Item Eliminado');
    $('#btnEditItem').addClass('d-none');
    $('#btnBorrarItem').addClass('d-none');
});


$('#btnGuardarItem').click(function (e) {
    if (validaFormItemEdit()) {
        dataSet[selectedItemIndex].descripcion = $('#inputDescripcionEdit').val()
        dataSet[selectedItemIndex].diente = $('#inputDienteEdit').val()
        dataSet[selectedItemIndex].observaciones = $('#inputObservacionEdit').val()
        dataSet[selectedItemIndex].valor = $('#inputValorEdit').val()
        dataSet[selectedItemIndex].desarrollo = $('#inputDesarrolloEdit').val()
        dataSet[selectedItemIndex].estado_pago = $('#inputEstadoEdit').val()
        dataSet[selectedItemIndex].fecha_pago = $('#inputFechaEdit').val()

        table_items.clear().draw();
        table_items.rows.add(dataSet).draw();
        updateSubtotal();
        modalItemEdit.hide();

        $('#btnEditItem').addClass('d-none');
        $('#btnBorrarItem').addClass('d-none');
        sendToast('secondary', 'Modificar Item', 'Item Modificado')
    }
})

$('#btnEditItem').click(function (e) {
    let dataSelected = dataSet[selectedItemIndex];
    $('#inputDescripcionEdit').val(dataSelected.descripcion);
    $('#inputDienteEdit').val(dataSelected.diente);
    $('#inputObservacionEdit').val(dataSelected.observaciones);
    $('#inputValorEdit').val(dataSelected.valor);
    $('#inputDesarrolloEdit').val(dataSelected.desarrollo);
    $('#inputEstadoEdit').val(dataSelected.estado_pago);
    $('#inputFechaEdit').val(dataSelected.fecha_pago);
    modalItemEdit.show();

})

$('#srcUser').change(function (e) {
    let usuario = $('#srcUser').val();

    if (usuario) {
        obtieneDataUsuario(usuario);
    }
})

function validateForm() {
    let nombre = $('#inputNombre').val();
    let items = dataSet.length;
    let usuario = $('#srcUser').val();

    if (usuario && nombre && items > 0) {
        return true;
    } else {
        $('#formPresupuesto').addClass('was-validated');

        if (!nombre) {
            sendToast('error', 'Error', 'Debe Ingresar el nombre del paciente.');
        }

        if (items == 0) {
            sendToast('error', 'Error', 'Debe Ingresar al menos un item al presupuesto.');
        }

        return false;
    }

}

function validaFormItem() {
    let desc = $('#inputDescripcion').val();
    let diente = $('#inputDiente').val();
    let valor = $('#inputValor').val();
    let fecha = $('#inputFecha').val();

    if (desc && diente && valor && fecha) {
        return true;
    } else {
        $('#formItemPresupuesto').addClass('was-validated');
        sendToast('error', 'Error', 'Debe completar los datos obligatorios.');
    }

}

function validaFormItemEdit() {
    let desc = $('#inputDescripcionEdit').val();
    let diente = $('#inputDienteEdit').val();
    let valor = $('#inputValorEdit').val();
    let fecha = $('#inputFechaEdit').val();

    if (desc && diente && valor && fecha) {
        return true;
    } else {
        $('#formItemPresupuestoEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Debe completar los datos obligatorios.');
    }

}

function resetForm() {
    $('#formPresupuesto').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputFono').val('');
    $('#inputCorreo').val('');
    $('#inputSubtotal').val('0');
    $('#inputDescuento').val('0');
    $('#inputTotal').val('0');

    dataSet = [];
    table_items.clear().draw();
}

function resetFormItem() {

    $('#formItemPresupuesto').removeClass('was-validated');
    $('#inputDescripcion').val('');
    $('#inputDiente').val('');
    $('#inputObservacion').val('');
    $('#inputValor').val('0');
    $('#inputDesarrollo').val('Pendiente');
    $('#inputEstado').val('Pendiente');
    $('#inputFecha').val('');

}

function resetFormItemEdit() {
    $('#formItemPresupuestoEdit').removeClass('was-validated');
    $('#inputDescripcionEdit').val('');
    $('#inputDienteEdit').val('');
    $('#inputObservacionEdit').val('');
    $('#inputValorEdit').val('0');
    $('#inputDesarrolloEdit').val('Pendiente');
    $('#inputEstadoEdit').val('Pendiente');
    $('#inputFechaEdit').val('');
}

function obtieneDataUsuario(usuario) {
    showLoader(true)
    $.ajax({
        url: $("#formGetPresupuesto").attr("action"),
        data: {
            usuario: usuario
        }
    })
        .done(function (result) {
            res = JSON.parse(result);
            table.clear().draw();
            table.rows.add(res).draw();
            showLoader(false)
        })

}

function updateTotal() {
    let subtotal = $("#inputSubtotal").val();
    let descuento = $("#inputDescuento").val();
    let total = subtotal - descuento;

    $('#inputTotal').val(total);
}

function updateSubtotal() {

    let subtotal = 0;
    let subvalor = 0;
    dataSet.forEach(item => {
        subvalor = item.valor ? item.valor : 0;
        subtotal = subtotal + parseInt(subvalor)
    })

    $('#inputSubtotal').val(subtotal);

    updateTotal();
}

$('#btnGuardarPresupuesto').click(function (e) {

    if (validateForm()) {
        showLoader(true);
        let usuario = $('#srcUser').val();

        $.ajax({
            url: $("#formPresupuesto").attr("action"),
            type: $("#formPresupuesto").attr("method"),
            data: {
                usuario: usuario,
                nombre: $('#inputNombre').val(),
                fono: $('#inputFono').val(),
                correo: $('#inputCorreo').val(),
                descuento: $('#inputDescuento').val(),
                items: dataSet,
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true'){
                    sendToast('success', 'Nuevo Presupuesto', 'Presupuesto Agregado')
                    obtieneDataUsuario(usuario)
                    modal.hide()
                }else{
                    sendToast('secondary', 'Error al agregar presupuesto', 'Consulte con el administrador de sistema')
                }
            }
        });
    }
});


$('#btnAddPresupuesto').click(function (e) {
    selectedPresupuestoIndex = '';
    e.preventDefault();
    let usuario = $('#srcUser').val();

    if (usuario) {
        dataSet = [];
        table_items.clear().draw();
        modal.show();
    } else {
        sendToast('error', 'Advertencia', 'Debe seleccionar un usuario');
    }
});

$("#inputDescuento").bind('keyup mouseup', function (e) {
    e.preventDefault();
    console.log($('#inputDescuento').val())
    updateTotal()
});


$('#btnAgregarItem').click(function (e) {

    if (validaFormItem()) {


        let descripcion = $('#inputDescripcion').val();
        let diente = $('#inputDiente').val();
        let observ = $('#inputObservacion').val();
        let valor = $('#inputValor').val();
        let desarrollo = $('#inputDesarrollo').val();
        let estado = $('#inputEstado').val();
        let fecha = $('#inputFecha').val();

        let itemAdd = {
            "descripcion": descripcion,
            "diente": diente,
            "observaciones": observ,
            "valor": valor,
            "desarrollo": desarrollo,
            "estado_pago": estado,
            "fecha_pago": fecha
        };

        dataSet.push(itemAdd);
        table_items.clear().draw();
        table_items.rows.add(dataSet).draw();

        modalItem.hide();
        updateSubtotal();
        sendToast('secondary', 'Presupuesto', 'Item Agregado')
    }

});

$('#btnModalItem').click(function (e) {
    resetFormItem();
    modalItem.show();
});


