let baseUrl = $('#hdnBaseUrl').val();
var myModalEl = document.getElementById('modalCita');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);

var myModalElEdit = document.getElementById('modalCitaEdit');
var modalEdit = bootstrap.Modal.getOrCreateInstance(myModalElEdit);

var myModalTarea = document.getElementById('modalTarea');
var modalTarea = bootstrap.Modal.getOrCreateInstance(myModalTarea);

var myModalTareaEdit = document.getElementById('modalTareaEdit');
var modalTareaEdit = bootstrap.Modal.getOrCreateInstance(myModalTareaEdit);

const toast = new bootstrap.Toast(document.getElementById('customToast'));
var table;
var tableTareas;


$(document).ready(function (e) {
    myModalEl.addEventListener('show.bs.modal', event => {
        resetForm();
    });

    table = $('#table_id').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'hora'},
            {data: 'paciente'},
            {data: 'fono'},
            {data: 'tratamiento'},
            {data: 'boleta'},
            {data: 'pago'},
            {data: 'monto'},
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

    tableTareas = $('#table_tareas').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'id', visible: false},
            {data: 'nombre'},
            {data: 'estado'},
            {data: 'estadoid', visible: false},
        ],
        "bLengthChange": false,
        "bInfo": false,
        "bPaginate": false,
        "bFilter": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        }
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

    tableTareas.on('select', function (e, dt, type, indexes) {
        if (type === 'row') {
            var data = table.rows(indexes).data();
            $('#btnTareaEdit').removeClass('d-none');
        }
    });

    tableTareas.on('deselect', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnTareaEdit').addClass('d-none');
        }
    });

    showLoader(false);
});

$('#btnTareaEdit').click(function (e) {

    let selectedDataTarea = tableTareas.rows({selected: true}).data()[0];
    console.log(selectedDataTarea)

    $('#inputNombreTareaEdit').val(selectedDataTarea.nombre)
    $('#inputEstadoTareaEdit').val(selectedDataTarea.estadoid)

    modalTareaEdit.show();
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
                modalTareaEdit.hide();
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
        modalTarea.show();
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
            modalTarea.hide();
        })
    } else {
        sendToast('danger', 'Error de Datos', 'Debe ingresar un Nombre de Tarea')
    }
})

$('#usrFecha').change(function (e) {
    let usuario = $('#srcUser').val();
    let fecha = $('#usrFecha').val();

    if (usuario) {
        obtieneDataUsuario(usuario, fecha);
    }
});

$('#srcUser').change(function (e) {
    let usuario = $('#srcUser').val();
    let fecha = $('#usrFecha').val();

    if (usuario) {
        obtieneDataUsuario(usuario, fecha);
    }
})

function obtieneDataUsuario(usuario, fecha) {
    showLoader(true)
    $.ajax({
        url: $("#formGetCitas").attr("action"),
        data: {
            usuario: usuario,
            fecha: fecha
        }
    })
        .done(function (result) {

            res = JSON.parse(result);
            table.clear().draw();
            tableTareas.clear().draw();
            table.rows.add(res.data).draw();
            tableTareas.rows.add(res.tareas).draw();

            $('#montoTotal').text(res.total[0].monto_total)
            showLoader(false)

        })

}

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
                    modalEdit.hide();
                    resetFormEdit();
                    if (usuario) {
                        obtieneDataUsuario(usuario, fecha);
                    }
                    sendToast('success', 'Editar Cita Médica', 'Modificación exitosa.');
                } else {
                    sendToast('error', 'Editar Cita Médica', 'Error al Modificar.');
                }
                modalEdit.hide();
            }
        });
    }
});

$('#btnEdit').click(function (e) {
    resetFormEdit();
    showLoader(true);
    let selectedData = table.rows({selected: true}).data()[0];
    let eventId = selectedData.id

    $.ajax({
        url: baseUrl + '/AdminCitas/getCitaDetalle',
        type: 'POST',
        data: {
            idCita: eventId,
        },
        success: function (respuesta) {
            resp = JSON.parse(respuesta)
            res = resp[0];
            resetFormEdit();
            $('#inputNombreEdit').val(res.nombre_pcte);
            $('#inputRutEdit').val(res.rut_pcte);
            $('#inputFonoEdit').val(res.fono);
            $('#inputEdadEdit').val(res.edad_pcte);
            $('#inputSexoEdit').val(res.sexo_pcte);
            $('#inputDireccionEdit').val(res.direccion_pcte);
            $('#inputFechaEdit').val(res.fecha);
            $('#inputHoraEdit').val(res.hora);
            $('#inputObservacionEdit').val(res.observacion);
            $('#inputPagoEdit').prop('checked', res.pago == 'true' ? true : false);
            $('#inputBoletaEdit').prop('checked', res.boleta == 'true' ? true : false);
            $('#inputMontoEdit').val(res.monto);
            showLoader(false);
        }
    });

    modalEdit.show();
});

$('#btnModalAddCita').click(function (e) {

    selUser = $('#srcUser').val();

    if (selUser) {
        modal.show();
    } else {
        sendToast('error', 'Error', 'Seleccione un Usuario.');
    }

});

$('#btnGuardar').click(function (e) {

    e.preventDefault();
    if (validateForm()) {
        showLoader(true);

        $.ajax({
            url: $("#formCita").attr("action"),
            type: $("#formCita").attr("method"),
            data: {
                usuario: $('#srcUser').val(),
                nombre: $('#inputNombre').val(),
                fono: $('#inputFono').val(),
                rut: $('#inputRut').val(),
                edad: $('#inputEdad').val(),
                sexo: $('#inputSexo').val(),
                direccion: $('#inputDireccion').val(),
                fecha: $('#inputFecha').val(),
                hora: $('#inputHora').val(),
                observacion: $('#inputObservacion').val(),
                pago: $('#inputPago').prop('checked'),
                boleta: $('#inputBoleta').prop('checked'),
                monto: $('#inputMonto').val()
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modal.hide();
                    resetForm();
                    sendToast('success', 'Registrar Cita Médita', 'Registro completo.');
                } else {
                    sendToast('error', 'Registrar Cita Médita', 'Error Registro.');
                }
                let usuario = $('#srcUser').val();
                let fecha = $('#usrFecha').val();

                if (usuario) {
                    obtieneDataUsuario(usuario, fecha);
                }
            }
        });


    } else {
        sendToast('error', 'Error', 'Debe completar todos los campos obligatorios.');
    }

})

function validateForm() {
    let nombre = $('#inputNombre').val();
    let fecha = $('#inputFecha').val();
    let hora = $('#inputHora').val();

    console.log('exe')

    if (nombre && fecha && hora) {
        return true;
    } else {
        $('#formCita').addClass('was-validated');
        sendToast('error', 'Error', 'Complete los campos obligatorios.');
        return false;
    }

}

function validateFormEdit() {
    let nombre = $('#inputNombreEdit').val();
    let fecha = $('#inputFechaEdit').val();
    let hora = $('#inputHoraEdit').val();

    console.log('exe')

    if (nombre && fecha && hora) {
        return true;
    } else {
        $('#formCitaEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Complete los campos obligatorios.');
        return false;
    }

}

function resetForm() {
    $('#formCita').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputRut').val('');
    $('#inputFono').val('');
    $('#inputEdad').val('');
    $('#inputSexo').val('');
    $('#inputDireccion').val('');
    $('#inputFecha').val('');
    $('#inputHora').val('');
    $('#inputObservacion').val('');
    $('#inputPago').prop('checked', false);
    $('#inputBoleta').prop('checked', false);
    $('#inputMonto').val('');
}

function resetFormEdit() {
    $('#formCitaEdit').removeClass('was-validated');
    $('#inputNombreEdit').val('');
    $('#inputRutEdit').val('');
    $('#inputFonoEdit').val('');
    $('#inputEdadEdit').val('');
    $('#inputSexoEdit').val('');
    $('#inputDireccionEdit').val('');
    $('#inputFechaEdit').val('');
    $('#inputHoraEdit').val('');
    $('#inputObservacionEdit').val('');
    $('#inputPagoEdit').prop('checked', false);
    $('#inputBoletaEdit').prop('checked', false);
    $('#inputMontoEdit').val('');
}
