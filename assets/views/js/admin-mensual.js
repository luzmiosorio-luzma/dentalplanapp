let baseUrl = $('#hdnBaseUrl').val();

var myModalEgreso = document.getElementById('modalEgreso');
var modalEgreso = bootstrap.Modal.getOrCreateInstance(myModalEgreso);

var myModalEgresoEdit = document.getElementById('modalEgresoEdit');
var modalEgresoEdit = bootstrap.Modal.getOrCreateInstance(myModalEgresoEdit);

const toast = new bootstrap.Toast(document.getElementById('customToast'));
var table;
var tableTareas;


$(document).ready(function (e) {
    myModalEgreso.addEventListener('show.bs.modal', event => {
        resetForm();
    });

    table = $('#table_id').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'fecha'},
            {data: 'detalle'},
            {data: 'valor'},
            {data: 'valor_num',visible: false},
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

    showLoader(false);
});

$('#btnTareaEdit').click(function (e) {

    let selectedDataTarea = tableTareas.rows({selected: true}).data()[0];
    $('#inputNombreTareaEdit').val(selectedDataTarea.nombre)
    $('#inputEstadoTareaEdit').val(selectedDataTarea.estadoid)

})

$('#btnGuardarTareaEdit').click(function (e) {
    let usuario = $('#srcUser').val();
    let fecha = $('#usrFecha').val();
    let nombre = $('#inputNombreTareaEdit').val();
    let estado = $('#inputEstadoTareaEdit').val();
    let selectedDataTarea = tableTareas.rows({selected: true}).data()[0];
    let tareaId = selectedDataTarea.id;

    if (usuario && fecha) {
        if (nombre && estado) {
            $.ajax({
                url: $("#formTareaEdit").attr("action"),
                data: {
                    tarea: tareaId,
                    nombre: nombre,
                    estado: estado
                }
            }).done(function (result) {
                if (result == 'true') {
                    sendToast('success', 'Actualizar Tarea', 'Tarea Actualizada');
                    obtieneDataUsuario(usuario, fecha)
                } else {
                    sendToast('danger', 'Actualizar Tarea', 'Error al actualizar tarea')
                }
                $('#btnTareaEdit').addClass('d-none');
            })
        } else {
            sendToast('danger', 'Error de Datos', 'Debe ingresar un Nombre y Estado')
        }
    } else {
        sendToast('danger', 'Error de Datos', 'Debe seleccionar una Fecha y Usuario')
    }
})

$('#btnTarea').click(function (e) {
    let usuario = $('#srcUser').val();
    let fecha = $('#usrFecha').val();


    if (usuario && fecha) {
        $('#inputNombreTarea').val('')
    } else {
        sendToast('sec', 'Datos', 'Debe Seleccionar una Fecha y un Usuario')
    }
});

$('#btnGuardarTarea').click(function (e) {
    let usuario = $('#srcUser').val();
    let fecha = $('#usrFecha').val()
    let tarea = $('#inputNombreTarea').val();

    if (tarea) {
        $.ajax({
            url: $("#formTarea").attr("action"),
            data: {
                usuario: usuario,
                fecha: fecha,
                tarea: tarea
            }
        }).done(function (result) {
            if (result == 'true') {
                sendToast('success', 'Agregar Tarea', 'Tarea Agregada');
                obtieneDataUsuario(usuario, fecha)
            } else {
                sendToast('danger', 'Agregar Tarea', 'Error al agregar tarea')
            }
        })
    } else {
        sendToast('danger', 'Error de Datos', 'Debe ingresar un Nombre de Tarea')
    }
})

$('#srcAnio').change(function (e) {
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
});

function runObtemerBalanceUsuario(){
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
}

$('#srcMes').change(function (e) {
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
});

$('#srcUser').change(function (e) {
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
})

function obtieneBalanceUsuario(usuario, mes, anio) {
    showLoader(true)
    $.ajax({
        url: $("#formBalance").attr("action"),
        data: {
            usuario: usuario,
            mes: mes,
            anio: anio
        }
    }).done(function (result) {
        console.log(result)
        res = JSON.parse(result);
        table.clear().draw();
        // table.rows.add(res).draw();
        table.rows.add(res.data.tabla).draw();

        $('#bruto').text('$'+res.data.ingresos);
        $('#descuentos').text('$'+res.data.egresos);
        $('#neto').text('$'+res.data.neto);
        showLoader(false)

    })

}

$('#btnGuardarEgresoEdit').click(function (e) {
    e.preventDefault();

    if (validateFormEdit()) {
        showLoader(true);
        let selectedData = table.rows({selected: true}).data()[0];
        let id = selectedData.id;

        $.ajax({
            url: $("#formEgresoEdit").attr("action"),
            type: $("#formEgresoEdit").attr("method"),
            data: {
                id: id,
                fecha: $('#inputFechaEdit').val(),
                detalle: $('#inputDetalleEdit').val(),
                valor: $('#inputValorEdit').val(),
            },
            success: function (respuesta) {
                modalEgresoEdit.hide()
                showLoader(false);
                if (respuesta == '"true"') {
                    runObtemerBalanceUsuario();
                    sendToast('success', 'Editar Egreso', 'Modificación exitosa.');
                } else {
                    sendToast('error', 'Editar Egreso', 'Error al Modificar.');
                }
            }
        });

    }
})

$('#btnGuardarEdit').click(function (e) {
    if (validateFormEdit()) {
        showLoader(true);

        let selectedData = table.rows({selected: true}).data()[0];
        let eventId = selectedData.id;

        let usuario = $('#srcUser').val();
        let fecha = $('#usrFecha').val();


        $.ajax({
            url: $("#formCitaEdit").attr("action"),
            type: $("#formCitaEdit").attr("method"),
            data: {
                idCita: eventId,
                usuario: $('#srcUser').val(),
                nombre: $('#inputNombreEdit').val(),
                rut: $('#inputRutEdit').val(),
                fono: $('#inputFonoEdit').val(),
                edad: $('#inputEdadEdit').val(),
                sexo: $('#inputSexoEdit').val(),
                direccion: $('#inputDireccionEdit').val(),
                fecha: $('#inputFechaEdit').val(),
                hora: $('#inputHoraEdit').val(),
                observacion: $('#inputObservacionEdit').val(),
                pago: $('#inputPagoEdit').prop('checked'),
                boleta: $('#inputBoletaEdit').prop('checked'),
                monto: $('#inputMontoEdit').val(),
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    resetFormEdit();
                    if (usuario) {
                        obtieneDataUsuario(usuario, fecha);
                    }
                    sendToast('success', 'Editar Cita Médica', 'Modificación exitosa.');
                } else {
                    sendToast('error', 'Editar Cita Médica', 'Error al Modificar.');
                }
            }
        });
    }
});

$('#btnEdit').click(function (e) {
    resetFormEdit();
    let selectedData = table.rows({selected: true}).data()[0];

    $('#inputFechaEdit').val(selectedData.fecha);
    $('#inputDetalleEdit').val(selectedData.detalle);
    $('#inputValorEdit').val(selectedData.valor_num);

    modalEgresoEdit.show();

});



$('#btnModalAddEgreso').click(function (e) {

    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();


    selUser = $('#srcUser').val();

    if (usuario && mes && anio) {
        modalEgreso.show()
    } else {
        sendToast('error', 'Error', 'Seleccione una fecha.');
    }

});

$('#btnGuardarEgreso').click(function (e) {

    e.preventDefault();
    if (validateForm()) {
        showLoader(true);
        $.ajax({
            url: $("#formEgreso").attr("action"),
            type: $("#formEgreso").attr("method"),
            data: {
                usuario: $('#srcUser').val(),
                fecha: $('#inputFecha').val(),
                detalle: $('#inputDetalle').val(),
                valor: $('#inputValor').val()
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == '"true"') {
                    resetForm();
                    sendToast('success', 'Registrar Egreso', 'Registro completo.');
                } else {
                    sendToast('error', 'Registrar Egreso', 'Error Registro.');
                }
                modalEgreso.hide()
                runObtemerBalanceUsuario();
            }
        });


    } else {
        sendToast('error', 'Error', 'Debe completar todos los campos obligatorios.');
    }

})

function validateForm() {
    let fecha = $('#inputFecha').val();
    let detalle = $('#inputDetalle').val();
    let valor = $('#inputValor').val();

    if (fecha && detalle && valor) {
        return true;
    } else {
        $('#formEgreso').addClass('was-validated');
        sendToast('error', 'Error', 'Complete los campos obligatorios.');
        return false;
    }

}

function validateFormEdit() {
    let fecha = $('#inputFechaEdit').val();
    let detalle = $('#inputDetalleEdit').val();
    let valor = $('#inputValorEdit').val();


    if (fecha && detalle && valor) {
        return true;
    } else {
        $('#formCitaEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Complete los campos obligatorios.');
        return false;
    }

}

function resetForm() {
    $('#formEgreso').removeClass('was-validated');
    $('#inputFecha').val('');
    $('#inputDetalle').val('');
    $('#inputValor').val('');
}

function resetFormEdit() {
    $('#formEgreso').removeClass('was-validated');
    $('#inputFechaEdit').val('');
    $('#inputDetalleEdit').val('');
    $('#inputValorEdit').val('');
}
