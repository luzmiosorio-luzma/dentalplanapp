const toast = new bootstrap.Toast(document.getElementById('customToast'));
let baseUrl = $('#hdnBaseUrl').val();
let calendarEl = document.getElementById('calendar');

var myModalEditCita = document.getElementById('modalEditCita');
var modalEditCita = bootstrap.Modal.getOrCreateInstance(myModalEditCita);

var myModalElimCita = document.getElementById('modalElimCita');
var modalElimCita = bootstrap.Modal.getOrCreateInstance(myModalElimCita);

var myModalEl = document.getElementById('modalNuevaCita');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);

let calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    height: 'auto',
    initialView: 'timeGridDay',
    slotMinTime: "08:00",
    slotMaxTime: "21:00",
    slotDuration: '00:30:00',
    slotLabelFormat: [{hour: 'numeric', minute: '2-digit'}],
    locale: 'es',
    firstDay: 1,
    editable: false,
    selectable: false,
    businessHours: true,
    dayMaxEvents: true,
    navLinks: true,
    eventClick: function (info) {

        let eventId = info.event.id;

        getCitaInfo(eventId);
    },
    datesSet: function (dateInfo) {
        console.log(dateInfo.view.type)
        if (dateInfo.view.type == 'dayGridMonth'){
            calendar.setOption('height', 1200);
        }else{
            calendar.setOption('height', 'auto');
        }
    },
    eventSources: [getCitas]
});


document.addEventListener('DOMContentLoaded', function () {
    myModalEl.addEventListener('show.bs.modal', event => {
        resetForm();
    });
    calendar.render();

    showLoader(false);
});

$('#btnEliminarModal').click(function (e) {
    modalElimCita.show()
})

$('#btnEliminar').click(function (e) {

    idCita = $('#hdnIdCita').val()

    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminCitas/removeCita',
        type: 'POST',
        data: {
            idCita: idCita,
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == 'true') {
                modalElimCita.hide();
                modalEditCita.hide();
                resetForm();
                sendToast('success', 'Eliminar Cita Médita', 'Registro completo.');
            } else {
                sendToast('error', 'Eliminar Cita Médita', 'Error Registro.');
            }
            calendar.refetchEvents();
        }
    });
})

$('#srcUsuario').change(function (e) {
    let usuario = $('#srcUsuario').val();
    if (usuario) {
        $('#btnModalNuevaCita').removeClass('disabled');
        calendar.refetchEvents()
    }
})

$('#btnGuardar').click(function (e) {
    e.preventDefault();

    if (validateForm()) {
        showLoader(true);

        $.ajax({
            url: $("#formCita").attr("action"),
            type: $("#formCita").attr("method"),
            data: {
                usuario: $('#srcUsuario').val(),
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
                calendar.refetchEvents();
            }
        });
    }
})

function getCitaInfo(eventId) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminCitas/getCitaDetalle',
        type: 'POST',
        data: {
            idCita: eventId,
        },
        success: function (respuesta) {
            resp = JSON.parse(respuesta)
            res = resp[0];
            desHabilitaFormEdit();
            resetFormEdit();
            $('#hdnIdCita').val(res.idCita);
            $('#inputEditNombre').val(res.nombre_pcte);
            $('#inputEditRut').val(res.rut_pcte);
            $('#inputEditEdad').val(res.edad_pcte);
            $('#inputEditSexo').val(res.sexo_pcte);
            $('#inputEditDireccion').val(res.direccion_pcte);
            $('#inputEditFecha').val(res.fecha);
            $('#inputEditHora').val(res.hora);
            $('#inputEditObservacion').val(res.observacion);
            showLoader(false);
            modalEditCita.show();

        }
    });
}

$('#btnEditarActivar').click(function (e) {
    habilitaFormEdit();
})

$('#btnEditarGuardar').click(function (e) {
    e.preventDefault();
    if (validateFormEdit()) {
        showLoader(true);

        $.ajax({

            url: $("#formEditCita").attr("action"),
            type: $("#formEditCita").attr("method"),
            data: {
                idCita: $('#hdnIdCita').val(),
                usuario: $('#srcUsuario').val(),
                nombre: $('#inputEditNombre').val(),
                rut: $('#inputEditRut').val(),
                edad: $('#inputEditEdad').val(),
                sexo: $('#inputEditSexo').val(),
                direccion: $('#inputEditDireccion').val(),
                fecha: $('#inputEditFecha').val(),
                hora: $('#inputEditHora').val(),
                observacion: $('#inputEditObservacion').val(),
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    modalEditCita.hide();
                    resetForm();
                    sendToast('success', 'Modificar Cita Médita', 'Registro completo.');
                } else {
                    sendToast('error', 'Modificar Cita Médita', 'Error Registro.');
                }
                calendar.refetchEvents();
            }
        });
    }
})

function habilitaFormEdit() {

    $('#inputEditNombre').prop('disabled', false);
    $('#inputEditRut').prop('disabled', false);
    $('#inputEditEdad').prop('disabled', false);
    $('#inputEditSexo').prop('disabled', false);
    $('#inputEditDireccion').prop('disabled', false);
    $('#inputEditFecha').prop('disabled', false);
    $('#inputEditHora').prop('disabled', false);
    $('#inputEditObservacion').prop('disabled', false);
    $('#btnEditarGuardar').removeClass('d-none');
    $('#btnEditarActivar').addClass('d-none');
}

function desHabilitaFormEdit() {
    $('#inputEditNombre').prop('disabled', true);
    $('#inputEditRut').prop('disabled', true);
    $('#inputEditEdad').prop('disabled', true);
    $('#inputEditSexo').prop('disabled', true);
    $('#inputEditDireccion').prop('disabled', true);
    $('#inputEditFecha').prop('disabled', true);
    $('#inputEditHora').prop('disabled', true);
    $('#inputEditObservacion').prop('disabled', true);
    $('#btnEditarGuardar').addClass('d-none');
    $('#btnEditarActivar').removeClass('d-none');
}

function resetForm() {
    $('#formCita').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputRut').val('');
    $('#inputEdad').val('');
    $('#inputFono').val('');
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
    $('#hdnIdCita').val('');
    $('#inputEditNombre').val('');
    $('#inputEditRut').val('');
    $('#inputEditEdad').val('');
    $('#inputEditSexo').val('');
    $('#inputEditDireccion').val('');
    $('#inputEditFecha').val('');
    $('#inputEditHora').val('');
    $('#inputEditObservacion').val('');
}

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

    let eventId = $('#hdnIdCita').val();
    let usuario = $('#srcUsuario').val();
    let nombre = $('#inputEditNombre').val();
    let rut = $('#inputEditRut').val();
    let edad = $('#inputEditEdad').val();
    let sexo = $('#inputEditSexo').val();
    let direccion = $('#inputEditDireccion').val();
    let fecha = $('#inputEditFecha').val();
    let hora = $('#inputEditHora').val();
    let observacion = $('#inputEditObservacion').val();

    if (eventId && nombre && usuario && rut && edad && sexo && direccion && fecha && hora && observacion) {
        return true;
    } else {
        $('#formEditCita').addClass('was-validated');
        return false;
    }

}

function getCitas(fetchInfo, successCallback, failureCallback) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminCitas/getUserCitas',
        type: 'POST',
        dataType: 'json',
        data: {
            usuario: usuario,
        },
        success: function (respuesta) {
            showLoader(false);
            successCallback(respuesta);
        },
        error: function (respuesta) {
            showLoader(false);
            failureCallback(respuesta)
        }
    });
}
