let baseUrl = $('#hdnBaseUrl').val();
const toast = new bootstrap.Toast(document.getElementById('customToast'));
let calendarEl = document.getElementById('calendar');
let hdnNovedades = $('#hdnNovedades').val();

var myModalEditCita = document.getElementById('modalEditCita');
var modalEditCita = bootstrap.Modal.getOrCreateInstance(myModalEditCita);

var myModalElimCita = document.getElementById('modalElimCita');
var modalElimCita = bootstrap.Modal.getOrCreateInstance(myModalElimCita);

var myModalNovedades = document.getElementById('modalNovedades');
var modalNovedades = bootstrap.Modal.getOrCreateInstance(myModalNovedades);

var myModalEl = document.getElementById('modalNuevaCita');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);

var modalElPaciente = document.getElementById('modalPaciente');
var modalPaciente = bootstrap.Modal.getOrCreateInstance(modalElPaciente);

var myModalTarea = document.getElementById('modalTarea');
var modalTarea = bootstrap.Modal.getOrCreateInstance(myModalTarea);

var myModalConf = document.getElementById('modalConfirmacion');
var modalConfirm = bootstrap.Modal.getOrCreateInstance(myModalConf);

let dropedEvent = [];
let src_tarea_estado = `<select class="form-select table_select form-linear select-tareas">
                        <option value="0">Pendiente</option>
                        <option value="1">Terminada</option>
                    </select>`;

let txt_tarea_nombre = `<input type="text" class="form-control table_select form-linear" >`;

let src_fecha = `<input id="datepick" type="date" class="form-control datepicker table_select form-linear">`;

let tableTareas;


let calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    // plugins: [ 'interaction' ],
    editable: true,
    timeZone: 'America/Santiago',
    eventDurationEditable: false,
    businessHours: false,
    allDayText: '',
    buttonText: {
        today: 'Hoy',
        month: 'Mensual',
        week: 'Semanal',
        day: 'Diario'
    },
    height: 'auto',
    initialView: 'timeGridWeek',
    selectable: false,
    slotMinTime: "08:00",
    slotMaxTime: "21:00",
    slotLabelFormat: [{hour: 'numeric', minute: '2-digit'}],
    slotLabelInterval: "01:00",
    slotHeight: 50, 
    locale: 'es',
    firstDay: 1,
    dayMaxEvents: true,
    navLinks: true,
    eventClick: function (info) {
        let eventId = info.event.id;
        getCitaInfo(eventId);
    },
    dateClick: function (info) {
        let fecha = info.dateStr.substr(0, 10);
        let hora = info.dateStr.substr(11, 2);
        let minutos = info.dateStr.substr(14, 2);
        resetForm();
        modal.show();

        $('#inputFecha').val(fecha);
        $('#srcHora').val(hora);
        $('#srcMinutos').val(minutos);

    },
    datesSet: function (dateInfo) {
        if (dateInfo.view.type === 'dayGridMonth') {
            calendar.setOption('height', 1200);
        } else {
            calendar.setOption('height', 'auto');
        }
    },
    eventContent: function (arg) {
        // Crear el contenedor del evento
        var containerEl = document.createElement('div');
        containerEl.className = 'd-flex flex-row justify-content-start align-items-center h-100 ms-2';


        // Crear el icono de FontAwesome
        var iconEl = document.createElement('i');
        iconEl.className = 'fa-brands fa-whatsapp ws-green';


        // Crear el botón y añadir el icono
        var buttonEl = document.createElement('button');
        buttonEl.className = 'btn-ws';
        buttonEl.appendChild(iconEl);

        // Añadir event listener al botón
        buttonEl.addEventListener('click', function (e) {
            e.stopPropagation();
            enviarWhatsapp(arg.event.id);
        });


        const inputDate = new Date(arg.event.startStr);
        // // Obtener la fecha y hora actual
        const currentDate = new Date();
        //
        // // Comparar las fechas
        if (inputDate > currentDate) {
            containerEl.appendChild(buttonEl);
        }

        // Crear el elemento del título del evento
        var titleEl = document.createElement('div');
        titleEl.className = 'cita-resumen';
        titleEl.innerHTML = arg.event.title + ' | ' + arg.timeText + '<br>' + arg.event.extendedProps.obs;
        containerEl.appendChild(titleEl);

        return {domNodes: [containerEl]};
    },
    eventDrop: function (info) {
        let event = info.event;
        let event_id = event.id;

        let dateStr = event.startStr;
        let dateArr = dateStr.split('T');

        let fecha = dateArr[0];
        let hora = dateArr[1];

        dropedEvent = {
            event_id: event_id,
            fecha: fecha,
            hora: hora,
            info: info
        }

        modalConfirm.show()

        // actualizarFechaHoraCita(event_id, fecha, hora);
    },
    // resources: function(callback){
    //     setTimeout(function(){
    //         var view = $('#calendar').fullCalendar('getView');
    //         $.ajax({
    //             url: 'feed.php',
    //             dataType: 'json',
    //             cache: false,
    //             data: {
    //                 start: view.start.format(),
    //                 end: view.end.format(),
    //                 timezone: view.options.timezone
    //             }
    //
    //         }).then(function(resources){callback(resources)});
    //     },0);
    // },
    eventSources: [getCitas]
});

function enviarWhatsapp(event_id) {
    $.ajax({
        url: baseUrl + '/AdminCitas/enviarWhatsapp',
        data: {
            event_id: event_id
        }
    }).done(function (result) {

        let parsed = JSON.parse(result);

        let status = parsed.status;

        if (status === 'error_phone_not_found') {
            sendToast('warning', 'Notificación', 'El paciente no dispone de un numero de teléfono en el sistema.')
        } else if (status === 'error_times_mensual') {
            sendToast('warning', 'Notificación', 'Ha excedido el limite máximo de notificaciones mensuales.')
        } else if (status === 'error_times') {
            sendToast('warning', 'Notificación', 'Solo puede enviar 1 notificacion por cita diariamente.')
        } else if (status === 'accepted') {
            sendToast('success', 'Notificacion Whatsapp', 'La notificación ha sido enviada')
        } else {
            sendToast('success', 'Notificacion Whatsapp', 'Intente nuevamente o consulte con soporte.')
        }
    })
}

$(document).on({
    mouseenter: function () {
        let cellWidth = $('th.fc-col-header-cell').width();
        let cellHeight = $(this).height();

        let columnCount = $('thead table.fc-col-header th.fc-col-header-cell').children().length;

        if (!$(this).html()) {
            for (var i = 0; i < columnCount; i++) {
                $(this).append('<td class="temp-cell" style="border:0px; height:' + (cellHeight - 1) + 'px;width:' + (cellWidth + 3) + 'px"></td>');
            }
        }
        $(this).children('td').each(function () {
            $(this).hover(function () {
                let dtime = $(this).parent().data('time').slice(0, -3);
                $(this).html('<div class="current-time">' + dtime + ' <i class="fa-solid fa-circle-plus"></i></div>');
            }, function () {
                $(this).html('');
            });
        });

    },

    mouseleave: function () {
        $(this).children('.temp-cell').remove();
    }

}, 'td.fc-timegrid-slot.fc-timegrid-slot-lane');

$('#btn_cancel_drag').click(function () {
    modalConfirm.hide()
    dropedEvent.info.revert();
    // sendToast('secondary', 'Modificar Cita', '')
});

$('#btn_acept_drag').click(function () {
    modalConfirm.hide()
    let event_id = dropedEvent.event_id;
    let fecha = dropedEvent.fecha;
    let hora = dropedEvent.hora;

    actualizarFechaHoraCita(event_id, fecha, hora);
})

$('.ui-widget-content').hover(function () {
    if (!$(this).html()) {
        for (let i = 0; i < 7; i++) {
            $(this).append('<td class="temp_cell" style="border: 0px; width:' + (Number($('.fc-day').width()) + 2) + 'px"></td>');
        }

        $(this).children('td').each(function () {
            $(this).hover(function () {
                $(this).css({'background-color': '#ffef8f', 'cursor': 'pointer'});
            }, function () {
                $(this).prop('style').removeProperty('background-color');
            });
        });
    }
}, function () {
    $(this).children('.temp_cell').remove();
});


$(document).ready(function () {

    tableTareas = $('#table_tareas').DataTable({
        columns: [
            {
                title: 'id_task', data: 'id_task', visible: false
            },
            {
                title: 'Fecha', data: 'fecha',
                "render": function (data, type, row, meta) {
                    return src_fecha;
                }
            },
            {
                title: 'Detalle', data: 'detalle',
                "render": function (data, type, row, meta) {
                    return txt_tarea_nombre;
                }
            },
            {
                title: 'Estado', data: 'estado',
                "render": function (data, type, row, meta) {
                    return src_tarea_estado;
                }
            },
            {
                title: 'Eliminar', data: 'id_task',
                "render": function (data, type, row, meta) {
                    return '<button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        columnDefs: [
            {
                targets: 1,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    let idtarea = rowData.id_task;
                    select.value = cellData;

                    select.addEventListener("change", function (e) {
                        select.blur()
                        actualizarTareaFecha(idtarea, select.value)
                    })

                }
            },
            {
                targets: 2,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    let idtarea = rowData.id_task;
                    select.value = cellData;

                    select.addEventListener("focusout", function (e) {

                        if (select.value !== cellData) {
                            actualizarTarea(idtarea, select.value)
                        }
                    })

                    select.addEventListener("keypress", function (e) {
                        if (e.key === 'Enter') {
                            select.blur()
                        }
                    })

                }
            },
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData;
                    select.addEventListener("change", function (e) {
                        // modificarDesarrolloItem(rowData.iditem_presupuesto, select.value)

                        switch (select.value) {
                            case "Pendiente":
                                this.classList.remove("select-warning");
                                this.classList.remove("select-success");
                                this.classList.add("select-danger");
                                break;
                            case "Terminado":
                                this.classList.remove("select-danger");
                                this.classList.remove("select-warning");
                                this.classList.add("select-success");
                                break;
                        }

                        select.blur()
                        modificarEstadoTarea(rowData.id_task, select.value);
                    })
                }
            },
            {
                targets: 4,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.addEventListener("click", function (e) {
                        eliminarTarea(cellData);
                    })

                }
            }
        ],
        "rowCallback": function (row, data) {

            select_elements = row.getElementsByTagName("select");

            let estado = data.estado;

            switch (estado) {
                case "0":
                    select_elements[0].setAttribute("class", "form-select form-linear select-danger")
                    break;
                case "1":
                    select_elements[0].setAttribute("class", "form-select form-linear select-success")
                    break;
            }

        },
        "bLengthChange": false,
        "bInfo": false,
        "paging": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function (settings, json) {
            // showLoader(false);
        },
    });

    let isJustLoggedIn = findGetParameter('isJustLogged');


    if(isJustLoggedIn === 'true' && hdnNovedades !== '0'){
        modalNovedades.show();
    }

});


function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    var items = location.search.substr(1).split("&");

    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}

$('#btnTarea').click(function () {
    $('#inputFechaTarea').val('');
    $('#inputNombreTarea').val('');
    $('#formTarea').removeClass('was-validated');
    modalTarea.show();
})


$('#btnGuardarTarea').click(function () {
    let inputFecha = $('#inputFechaTarea').val();
    let inputDetalle = $('#inputNombreTarea').val();
    let formTarea = $('#formTarea');
    let usuario = $('#srcUser').val();

    if (inputFecha && inputDetalle) {
        $.ajax({
            url: formTarea.attr("action"),
            type: formTarea.attr("method"),
            data: {
                fecha: inputFecha,
                usuario: usuario,
                tarea: inputDetalle
            },
            success: function (respuesta) {
                modalTarea.hide();
                sendToast('success', 'Agregar Tarea', 'Tarea Agregada.');
                obtenerTareas()
            }
        });
    } else {
        formTarea.addClass('was-validated');
        sendToast('error', 'Agregar Tarea', 'Faltan datos obligatorios.')
    }
});


function obtenerTareas() {


    let at = calendar.view.activeStart;
    let et = calendar.view.activeEnd;
    let start = at.getUTCFullYear() + "-" + (parseInt(at.getUTCMonth()) + 1) + "-" + at.getUTCDate();
    let end = et.getUTCFullYear() + "-" + (parseInt(et.getUTCMonth()) + 1) + "-" + et.getUTCDate();

    let usuario = $('#srcUser').val();

    $.ajax({
        url: baseUrl + '/UserCitas/getTareas',
        data: {
            usuario: usuario,
            start: start,
            end: end
        }
    }).done(function (result) {
        let res = JSON.parse(result);
        tableTareas.clear().draw();
        tableTareas.rows.add(res.data.tabla_tareas).draw();

        if (isLoaderVisible()) {
            showLoader(false)
        }

    })
}

function actualizarTareaFecha(idtarea, fecha) {
    $.ajax({
        url: baseUrl + '/UserMensual/editTareaFecha',
        data: {
            tarea: idtarea,
            fecha: fecha,
            usuario: $('#srcUser').val()
        }
    }).done(function (result) {
        if (result === '"true"') {
            obtenerTareas()
            sendToast('success', 'Actualizar Tarea', 'Tarea actualizada.')
        } else {
            sendToast('error', 'Actualizar Tarea', 'Error al actualizar tarea.')

        }
    })
}

function actualizarTarea(idtarea, tarea) {


    $.ajax({
        url: baseUrl + '/UserMensual/editTareaDetalle',
        data: {
            tarea: idtarea,
            tarea_detalle: tarea,
            usuario: $('#srcUser').val()
        }
    }).done(function (result) {
        if (result === '"true"') {
            obtenerTareas()
            sendToast('success', 'Actualizar Tarea', 'Tarea actualizada.')
        } else {
            sendToast('error', 'Actualizar Tarea', 'Error al actualizar tarea.')

        }
    })
}

function eliminarTarea(idtarea) {
    $.ajax({
        url: baseUrl + '/UserMensual/eliminarTarea',
        data: {
            tarea: idtarea,
            usuario: $('#srcUser').val()
        }
    }).done(function (result) {
        if (result === '"true"') {
            obtenerTareas()
            sendToast('success', 'Eliminar Tarea', 'Tarea eliminada.')
        } else {
            sendToast('error', 'Eliminar Tarea', 'Error al eliminar tarea.')

        }
    })
}

function modificarEstadoTarea(id_tarea, valor) {
    $.ajax({
        url: baseUrl + '/UserMensual/editTareaEstado',
        data: {
            tarea: id_tarea,
            estado: valor
        }
    }).done(function (result) {
        obtenerTareas()
        if (result === '"true"') {
            sendToast('success', 'Actualizar Tarea', 'Tarea actualizada.')
        } else {
            sendToast('error', 'Actualizar Tarea', 'Error al actualizar tarea.')

        }
    })
}

document.addEventListener('DOMContentLoaded', function () {

    $('#openModal').on('click', function () {
        var myModal = new bootstrap.Modal($('#myModal'), {
            keyboard: true
        });
        myModal.show();
    });


    $('#inputPaciente').select2({
        dropdownParent: $('#modalNuevaCita'),
        placeholder: "Selecciona una opción",
        allowClear: true,
        width: 'resolve',
        language: {
            noResults: function () {
                return "No se encontraron resultados"; // Cambia el texto aquí
            }
        },
    });

    myModalEl.addEventListener('show.bs.modal', event => {
        resetForm();
    });
    calendar.render();

    showLoader(false);
});

$('#btnModalPaciente').click(function (e) {
    resetFormPaciente()
    modalPaciente.show();
})

$('#btnEliminarModal').click(function (e) {
    modalElimCita.show()
})

$('#btn_link_ficha').click(function (e) {
    let paciente = $('#inputPaciente').val();
    linkFicha(paciente)
})

$('#btn_link_ficha_edit').click(function (e) {
    let paciente = $('#inputPacienteEdit').val();
    linkFicha(paciente)
})


function linkFicha(paciente) {
    if (paciente) {
        window.location.href = baseUrl + '/user/ficha?pid=' + paciente;
    } else {
        sendToast('secondary', 'Paciente', 'Debe seleccionar un paciente');
    }
}

$('#btnEliminar').click(function (e) {

    modalElimCita.hide();

    let idCita = $('#hdnIdCita').val()

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

        let hora = $('#srcHora').val() + ":" + $('#srcMinutos').val();

        $.ajax({
            url: $("#formCita").attr("action"),
            type: $("#formCita").attr("method"),
            data: {
                usuario: $('#srcUsuario').val(),
                paciente: $('#inputPaciente').val(),
                direccion: $('#inputDireccion').val(),
                fecha: $('#inputFecha').val(),
                hora: hora,
                duracion: $('#srcDuracion').val(),
                observacion: $('#inputObservacion').val(),
                pago: $('#inputPago').prop('checked'),
                boleta: $('#inputBoleta').prop('checked'),
                monto: $('#inputMonto').val(),
                asistencia: $('#inputAsistencia').prop('checked')
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
            let resp = JSON.parse(respuesta)
            let res = resp[0];
            let hora = res.hora.substr(0, 2);

            let minutos = res.hora.substr(3, 2);
            // desHabilitaFormEdit();
            resetFormEdit();
            $('#hdnIdCita').val(res.idCita);
            $('#inputPacienteEdit').val(res.idpaciente);
            $('#inputFechaEdit').val(res.fecha);
            $('#srcHoraEdit').val(hora);
            $('#srcMinutosEdit').val(minutos);
            $('#srcDuracionEdit').val(res.duracion);
            $('#inputObservacionEdit').val(res.observacion);
            $('#inputPagoEdit').prop('checked', res.pago == 'true' ? true : false);
            $('#inputBoletaEdit').prop('checked', res.boleta == 'true' ? true : false);
            $('#inputMontoEdit').val(res.monto);
            $('#inputAsistenciaEdit').prop('checked', res.asistencia == 'true' ? true : false);

            showLoader(false);
            modalEditCita.show();

        }
    });
}

$('#btnEditarActivar').click(function (e) {
    habilitaFormEdit();
})

$('#btnSaveEditar').click(function (e) {
    e.preventDefault();
    if (validateFormEdit()) {
        showLoader(true);

        let hora = $('#srcHoraEdit').val() + ":" + $('#srcMinutosEdit').val()

        $.ajax({
            url: $("#formEditCita").attr("action"),
            type: $("#formEditCita").attr("method"),
            data: {
                idCita: $('#hdnIdCita').val(),
                fecha: $('#inputFechaEdit').val(),
                hora: hora,
                duracion: $('#srcDuracionEdit').val(),
                observacion: $('#inputObservacionEdit').val(),
                pago: $('#inputPagoEdit').prop('checked'),
                boleta: $('#inputBoletaEdit').prop('checked'),
                monto: $('#inputMontoEdit').val(),
                asistencia: $('#inputAsistenciaEdit').prop('checked'),

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
            }, error: function (respuesta) {
                showLoader(false);
                sendToast('error', 'Modificar Cita Médita', 'Error Registro.');
            }
        });
    }
})

function actualizarFechaHoraCita(id_cita, fecha, hora) {
    $.ajax({
        url: baseUrl + '/AdminCitas/updateFechaCita',
        type: "POST",
        data: {
            id_cita: id_cita,
            fecha: fecha,
            hora: hora,
        },
        success: function (respuesta) {
            sendToast('success', 'Modificar Cita Médita', 'Cita actualizada.');
            calendar.refetchEvents();
        }, error: function (respuesta) {
            sendToast('Error', 'Modificar Cita Médita', 'Error al actualizar cita.');
            calendar.refetchEvents();
        }
    });
}

function habilitaFormEdit() {
    $('#inputEditNombre').prop('disabled', false);
    $('#inputEditRut').prop('disabled', false);
    $('#inputEditEdad').prop('disabled', false);
    $('#inputEditSexo').prop('disabled', false);
    $('#inputEditDireccion').prop('disabled', false);
    $('#inputEditFecha').prop('disabled', false);
    $('#inputEditHora').prop('disabled', false);
    $('#inputEditObservacion').prop('disabled', false);
    $('#btnEditarActivar').addClass('d-none');
}

function desHabilitaFormEdit() {
    $('#inputFechaEdit').prop('disabled', true);
    $('#srcHora').prop('disabled', true);
    $('#srcMinutos').prop('disabled', true);

    $('#inputPagoEdit').prop('disabled', true);
    $('#inputBoletaEdit').prop('disabled', true);
    $('#inputObservacionEdit').prop('disabled', true);
    $('#inputMontoEdit').prop('disabled', true);
}

function resetForm() {
    $('#formCita').removeClass('was-validated');
    // $('#inputPaciente').select2.defaults.reset();

    $('#inputPaciente').val(null).trigger('change');

    $('#inputFecha').val('');

    //TODO REVISAR TODOS LOS ELEMENTOS INPUTHORA Y REEMPLAZAR
    $('#srcHora').val('');
    $('#srcMinutos').val('');
    $('#srcDuracion').val('1');

    $('#inputObservacion').val('');
    $('#inputPago').prop('checked', false);
    $('#inputBoleta').prop('checked', false);
    $('#inputMonto').val('');
}

function resetFormEdit() {
    $('#formEditCita').removeClass('was-validated');
    $('#hdnIdCita').val('');
    $('#inputPacienteEdit').val('');
    $('#inputFechaEdit').val('');
    $('#srcHora').val('');
    $('#srcMinutos').val('');

    $('#inputObservacionEdit').val('');
    $('#inputPagoEdit').prop('checked', false);
    $('#inputBoletaEdit').prop('checked', false);
    $('#inputMontoEdit').val('');

}

function validateForm() {

    let paciente = $('#inputPaciente').val();
    let fecha = $('#inputFecha').val();
    let hora = $('#srcHora').val();
    let minutos = $('#srcMinutos').val();

    if (paciente && fecha && hora && minutos) {
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
    let paciente = $('#inputPacienteEdit').val();
    let fecha = $('#inputFechaEdit').val();
    let hora = $('#srcHoraEdit').val();
    let minutos = $('#srcMinutosEdit').val();

    if (eventId && paciente && usuario && fecha && hora && minutos) {
        return true;
    } else {
        $('#formEditCita').addClass('was-validated');
        return false;
    }

}

function getCitas(fetchInfo, successCallback, failureCallback) {

    // let view = calendar.fullCalendar('getView');
    let start = fetchInfo.startStr;
    let end = fetchInfo.endStr;


    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminCitas/getUserCitas',
        type: 'POST',
        data: {
            usuario: $('#srcUsuario').val(),
            start: start,
            end: end
        },
        success: function (respuesta) {
            showLoader(false);

            let data = JSON.parse(respuesta);
            let citas = data.citas;
            let tareas = data.tareas;

            tableTareas.clear().draw();
            tableTareas.rows.add(tareas).draw();

            successCallback(citas)
        },
        error: function (respuesta) {
            showLoader(false);
            failureCallback(respuesta)
        }
    });
}

$('#btnGuardarPaciente').click(function (e) {
    if (validateFormPaciente()) {
        showLoader(true);
        let usuario = $('#srcUser').val();
        let nacionalidad = $('#inputNacionalidad').val();
        let rut = $('#inputRut').val();

        if (nacionalidad === "1") {
            rut = formatRUT(rut);
        }


        $.ajax({
            url: baseUrl + '/UserPaciente/addPacienteDinamic',
            type: 'POST',
            data: {
                usuario: usuario,
                nombre: $('#inputNombre').val(),
                rut: rut,
                edad: $('#inputEdad').val(),
                sexo: $('#inputSexo').val(),
                nacionalidad: nacionalidad,
                fono: $('#inputFono').val(),
                mail: $('#inputCorreo').val(),
                direccion: $('#inputDireccion').val(),
                prevision: $('#inputPrev').val(),
            },
            success: function (respuesta) {
                let res = JSON.parse(respuesta)
                let id_paciente = res.id_paciente;
                let result = res.result;

                showLoader(false);
                if (result === 'true') {
                    sendToast('success', 'Nuevo Paciente', 'Paciente Agregado')
                    //TODO recargar combo pacientes
                    obtienePacientes(id_paciente);
                    modalPaciente.hide()
                } else {
                    sendToast('secondary', 'Error al agregar paciente', 'Consulte con el administrador de sistema')
                }
            }
        });
    }
})

function obtienePacientes(id_paciente) {
    $.ajax({
        url: baseUrl + '/UserPaciente/obtieneUserPacientes',
        type: 'POST',
        data: {
            usuario: $('#srcUser').val()
        },
        success: function (respuesta) {
            showLoader(false);

            let res = JSON.parse(respuesta)
            let inputPaciente = $('#inputPaciente');
            let inputPacienteEdit = $('#inputPacienteEdit');

            inputPaciente.empty();
            inputPacienteEdit.empty();

            if (res.length === 0) {
                let option_el = '<option value="" disabled="disabled" selected>Seleccione...</option>';

                inputPaciente.append(option_el);
                inputPacienteEdit.append(option_el);
            } else {
                res.forEach(el => {
                    let option_el = '<option value="' + el.idpaciente + '">' + el.nombre + ' - ' + el.rut + '</option>';

                    inputPaciente.append(option_el);
                    inputPacienteEdit.append(option_el);
                });
            }

            $('#inputPaciente').val(id_paciente);

        }
    });
}

function validateFormPaciente() {
    let nombre = $('#inputNombre').val();
    let rut = $('#inputRut').val();
    let usuario = $('#srcUser').val();

    if (usuario && nombre && rut) {
        let nacionalidad = $('#inputNacionalidad').val();

        if (nacionalidad === '1') {
            let validaRut = validarRUT(rut);

            if (validaRut) {
                return true;
            } else {
                sendToast('error', 'Error', 'El Rut ingresado no es válido.');
                return false;
            }
        } else {
            return true;
        }
    } else {
        $('#formPaciente').addClass('was-validated');
        sendToast('error', 'Error', 'Debe completar los campos obligatorios.');
        return false;
    }

}

function formatRUT(rut) {
    let valor = rut.replace(/[^0-9kK]+/g, '').toUpperCase();

    let resultado = agregarGuionYFormatearNumero(valor);

    return resultado;
}

function agregarGuionYFormatearNumero(cadena) {
    if (cadena.length > 1) {
        // Separa la parte numérica (antes del guion) y el último caracter
        let parteNumerica = cadena.slice(0, -1);
        let ultimoCaracter = cadena.slice(-1);

        // Formatear la parte numérica con separador de miles
        let parteNumericaFormateada = new Intl.NumberFormat('de-DE').format(parteNumerica);

        // Combinar la parte formateada con el último carácter y el guion
        return parteNumericaFormateada + '-' + ultimoCaracter;
    } else {
        return cadena; // Si la cadena tiene un solo carácter, no se modifica
    }
}

function validarRUT(rut) {

    let pre_valid = rut.slice(-1).toUpperCase();

    if (esNumero(pre_valid) === false && pre_valid !== 'K') {
        return false;
    }

    // Limpiar el RUT dejando solo números y el carácter k
    var valor = rut.replace(/[^0-9kK]+/g, '').toUpperCase();

    // Dividir el cuerpo y el dígito verificador
    var cuerpo = valor.slice(0, -1);
    var dv = valor.slice(-1).toUpperCase();


    // Verificar que el cuerpo tenga al menos 7 dígitos (largo mínimo sin contar dígito verificador)
    if (cuerpo.length < 7) {
        return false;
    }

    // Calcular dígito verificador
    var suma = 0;
    var multiplo = 2;
    for (var i = 1; i <= cuerpo.length; i++) {
        var index = multiplo * valor.charAt(cuerpo.length - i);
        suma = suma + index;
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }
    }

    var dvEsperado = 11 - (suma % 11);

    dv = (dv == 'K') ? 10 : (dv == '0') ? 11 : dv;
    dv = parseInt(dv);


    // DV esperado 11 es igual a 0
    // if (dvEsperado == 11) {
    //     dvEsperado = 0;
    // }

    // DV esperado 10 es igual a K
    // if (dvEsperado == 10) {
    //     dvEsperado = 'K';
    // }

    // Verificar DV
    if (dvEsperado != dv) {
        return false;
    }

    // Si todo está correcto
    return true;
}

function esNumero(caracter) {
    return caracter >= '0' && caracter <= '9';
}


function resetFormPaciente() {
    $('#formPaciente').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputRut').val('');
    $('#inputNacionalidad').val('1');
    $('#inputEdad').val('');
    $('#inputSexo').val('');
    $('#inputFono').val('');
    $('#inputCorreo').val('');
    $('#inputDireccion').val('');
    $('#inputPrev').val('');
}
