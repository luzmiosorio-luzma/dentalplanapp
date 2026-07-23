let baseUrl = $('#hdnBaseUrl').val();

var myModalEgreso = document.getElementById('modalEgreso');
var modalEgreso = bootstrap.Modal.getOrCreateInstance(myModalEgreso);

var myModalEgresoEdit = document.getElementById('modalEgresoEdit');
var modalEgresoEdit = bootstrap.Modal.getOrCreateInstance(myModalEgresoEdit);

var myModalIngreso = document.getElementById('modalIngreso');
var modalIngreso = bootstrap.Modal.getOrCreateInstance(myModalIngreso);

var myModalTarea = document.getElementById('modalTarea');
var modalTarea = bootstrap.Modal.getOrCreateInstance(myModalTarea);

const toast = new bootstrap.Toast(document.getElementById('customToast'));
var table, table_citas, tableTareas;


let src_tarea_estado = `<select class="form-select table_select select-tareas">
                        <option value="0">Pendiente</option>
                        <option value="1">Terminada</option>
                    </select>`;

let txt_tarea_nombre = `<input type="text" class="form-control table_select" >`;

let src_fecha = `<input id="datepick" type="date" class="form-control datepicker table_select">`;


$(document).ready(function () {
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
            {data: 'valor_num', visible: false},
            {data: 'cod_tipo_egreso', visible: false}
        ],
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

    table_citas = $('#table_citas').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'idcita', visible: false},
            {data: 'fecha', "width": "20%"},
            {data: 'paciente', "width": "30%"},
            {data: 'detalle'},
            {data: 'pago'},
            {data: 'boleta'},
            {data: 'valor', "width": "10%"},
            {data: 'valor_num', visible: false},
        ],
        order: [[1, 'desc']],
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

    // <button className="btn btn-outline-danger btn-sm"><i className="fa fa-trash"></i></button>
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
                        console.log(select.value);

                        switch (select.value) {
                            case "0":
                                this.classList.remove("select-warning");
                                this.classList.remove("select-success");
                                this.classList.add("select-danger");
                                break;
                            case "1":
                                this.classList.remove("select-danger");
                                this.classList.remove("select-warning");
                                this.classList.add("select-success");
                                break;
                        }


                        select.blur()
                        modificarEstadoTarea(rowData.id_task, select.value);
                        // console.log(select.value, rowData.id_task)
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

            select_elements = row.getElementsByClassName("select-tareas");

            let estado = data.estado;
            // console.log(select_elements, estado);
            if (select_elements[0]) {
                switch (estado) {
                    case "0":
                        select_elements[0].setAttribute("class", "form-select form-linear select-danger")
                        break;
                    case "1":
                        select_elements[0].setAttribute("class", "form-select form-linear select-success")
                        break;
                }
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

    let usuario = $('#srcUser').val();
    var fecha = new Date();
    var mes = parseInt(fecha.getMonth()) + 1;
    var anio = fecha.getFullYear();

    console.log(mes, anio);

    $('#srcMes').val(mes);
    $('#srcAnio').val(anio);

    obtieneBalanceUsuario(usuario, mes, anio);

    function waitForTableLoad(dataTable) {
        return new Promise(function (resolve, reject) {
            dataTable.on('draw', function () {
                resolve();
            });
        });
    }

    var promesaTabla1 = waitForTableLoad(table);
    var promesaTabla2 = waitForTableLoad(table_citas);
    var promesaTabla3 = waitForTableLoad(tableTareas);

    Promise.all([promesaTabla1, promesaTabla2, promesaTabla3]).then(function () {
        showLoader(false);
    });
});

$('#btnGuardarIngreso').click(function (e) {

    if (validaOtroIngreso() == true) {
        let fecha = $('#inputIngresoFecha').val();
        let detalle = $('#inputIngresoDetalle').val();
        let pago = $('#inputIngresoPago').val();
        let boleta = $('#inputIngresoBoleta').val();
        let monto = $('#inputIngresoValor').val();

        showLoader(true);

        $.ajax({
            url: baseUrl + '/UserMensual/addOtroIngreso',
            data: {
                usuario: $('#srcUser').val(),
                fecha: fecha,
                detalle: detalle,
                pago: pago,
                boleta: boleta,
                monto: monto
            }
        }).done(function (result) {
            if (result == 'true'){
                sendToast('success', 'Registrar Ingreso', 'success');
                modalIngreso.hide();
                runObtemerBalanceUsuario();
            }else{
                sendToast('error', 'Registrar Ingreso', 'error')
            }
            showLoader(false);
        })

    } else {
        sendToast('error', 'Registrar Ingreso', 'Debe completar la información')
    }
})

$('#btnModalAddIngreso').click(function (e) {
    console.log('asdasdasd')
    resertFormIngreso()
    modalIngreso.show();
})

function validaOtroIngreso() {
    let fecha = $('#inputIngresoFecha').val();
    let detalle = $('#inputIngresoDetalle').val();
    let pago = $('#inputIngresoPago').val();
    let boleta = $('#inputIngresoBoleta').val();
    let monto = $('#inputIngresoValor').val();



    if (fecha && detalle != '' && pago && boleta && monto) {
        return true;
    } else {
        $('#formIngreso').addClass('was-validated');
        return false;
    }
}

function resertFormIngreso() {
    $('#inputIngresoFecha').val('');
    $('#inputIngresoDetalle').val('');
    $('#inputIngresoPago').val(0);
    $('#inputIngresoBoleta').val(0);
    $('#inputIngresoValor').val('');
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
        console.log(result)
        if (result === '"true"') {
            let usuario = $('#srcUser').val();
            let mes = $('#srcMes').val();
            let anio = $('#srcAnio').val();

            if (usuario && mes && anio) {
                obtieneBalanceUsuario(usuario, mes, anio);
            }
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
        console.log(result)
        if (result === '"true"') {
            let usuario = $('#srcUser').val();
            let mes = $('#srcMes').val();
            let anio = $('#srcAnio').val();

            if (usuario && mes && anio) {
                obtieneBalanceUsuario(usuario, mes, anio);
            }
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
        console.log(result)
        if (result === '"true"') {
            let usuario = $('#srcUser').val();
            let mes = $('#srcMes').val();
            let anio = $('#srcAnio').val();

            if (usuario && mes && anio) {
                obtieneBalanceUsuario(usuario, mes, anio);
            }
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
        console.log(result)
        if (result === '"true"') {
            sendToast('success', 'Actualizar Tarea', 'Tarea actualizada.')
        } else {
            sendToast('error', 'Actualizar Tarea', 'Error al actualizar tarea.')

        }
    })
}

function runObtemerBalanceUsuario() {
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
}

$('#srcAnio').change(function (e) {
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
});

$('#srcMes').change(function (e) {
    let usuario = $('#srcUser').val();
    let mes = $('#srcMes').val();
    let anio = $('#srcAnio').val();

    if (usuario && mes && anio) {
        obtieneBalanceUsuario(usuario, mes, anio);
    }
});

function obtieneBalanceUsuario(usuario, mes, anio) {
    showLoader(true)
    $.ajax({
        url: baseUrl + '/UserMensual/getBalance',
        data: {
            usuario: usuario,
            mes: mes,
            anio: anio
        }
    }).done(function (result) {
        res = JSON.parse(result);
        table.clear().draw();
        table_citas.clear().draw();
        tableTareas.clear().draw();
        // table.rows.add(res).draw();
        table.rows.add(res.data.tabla_egresos).draw();
        table_citas.rows.add(res.data.tabla_ingresos).draw();
        tableTareas.rows.add(res.data.tabla_tareas).draw();

        let detalle_egreso = res.data.egresos_detalle;
        let el_detalle;
        let ingreso_container = $('#itemIngresoContainer');
        let neto_container = $('#itemNetoContainer');

        $('#itemEgresoContainer').empty();

        neto_container.empty();
        ingreso_container.empty();
        detalle_egreso.forEach(item => {
            el_detalle = `<li class="itemEgresoElement list-group-item list-group-item-info ">
                            <span class="itemEgresoNombre col-7">${item.tipo_ingreso}</span>
                            <div class="d-flex flex-row">
                                <span class="col-2">$</span>
                                <span class="col-10 itemEgresoValor d-flex justify-content-end">${item.valor}</span>
                            </div></li>`;

            $('#itemEgresoContainer').append(el_detalle);
        })

        let el_ingreso_con_boleta = `<li class="itemEgresoElement list-group-item list-group-item-info ">
                            <span class="itemEgresoNombre col-7">Ingresos con Boleta</span>
                            <div class="d-flex flex-row">
                                <span class="col-2">$</span>
                                <span class="col-10 itemEgresoValor d-flex justify-content-end">${res.data.ingresos_con_boleta}</span>
                            </div></li>`;


        let el_otro_ingreso_con_boleta = `<li class="itemEgresoElement list-group-item list-group-item-info bg-info text-dark">
                            <span class="itemEgresoNombre col-7">Otros ingresos con Boleta</span>
                            <div class="d-flex flex-row ">
                                <span class="col-2">$</span>
                                <span class="col-10 itemEgresoValor d-flex justify-content-end">${res.data.otros_ingresos_con_boleta}</span>
                            </div></li>`;



        let el_ingreso_sin_boleta = `<li class="itemEgresoElement list-group-item list-group-item-info ">
                            <span class="itemEgresoNombre col-7">Ingresos sin Boleta</span>
                            <div class="d-flex flex-row">
                                <span class="col-2">$</span>
                                <span class="col-10 itemEgresoValor d-flex justify-content-end">${res.data.ingresos_sin_boleta}</span>
                            </div></li>`;

        let el_otros_ingreso_sin_boleta = `<li class="itemEgresoElement list-group-item list-group-item-info bg-info text-dark">
                            <span class="itemEgresoNombre col-7">Otros ingresos sin Boleta</span>
                            <div class="d-flex flex-row">
                                <span class="col-2">$</span>
                                <span class="col-10 itemEgresoValor d-flex justify-content-end">${res.data.otros_ingresos_sin_boleta}</span>
                            </div></li>`;

        let impuestos = `<li class="itemEgresoElement list-group-item list-group-item-info ">
                            <span class="itemEgresoNombre col-7">Impuestos ${res.data.txt_impuesto}%</span>
                            <div class="d-flex flex-row">
                                <span class="col-2">$</span>
                                <span class="col-10 itemEgresoValor d-flex justify-content-end">${res.data.impuestos}</span>
                            </div></li>`;

        ingreso_container.append(el_ingreso_con_boleta);
        ingreso_container.append(el_ingreso_sin_boleta);
        ingreso_container.append(el_otro_ingreso_con_boleta);
        ingreso_container.append(el_otros_ingreso_sin_boleta);
        neto_container.append(impuestos);

        $('#bruto').text('$' + res.data.ingresos);
        $('#descuentos').text('$' + res.data.egresos);
        $('#neto').text('$' + res.data.neto);

        $('#btnDetalleIngreso').removeClass('invisible');
        $('#btnDetalleNeto').removeClass('invisible');
        $('#btnDetalleEgresos').removeClass('invisible');
        showLoader(false)

    })

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
                console.log(respuesta)

                sendToast('success', 'Agregar Tarea', 'Tarea Agregada.');


                let usuario = $('#srcUser').val();
                let mes = $('#srcMes').val();
                let anio = $('#srcAnio').val();

                if (usuario && mes && anio) {
                    obtieneBalanceUsuario(usuario, mes, anio);
                }

            }
        });
    } else {
        formTarea.addClass('was-validated');
        sendToast('error', 'Agregar Tarea', 'Faltan datos obligatorios.')
    }
});

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
                tipo_egreso: $('#inputTipoEgresoEdit').val(),
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

    $('#inputTipoEgresoEdit').val(selectedData.cod_tipo_egreso);
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
            url: baseUrl + '/UserMensual/addEgreso',
            type: 'POST',
            data: {
                usuario: $('#srcUser').val(),
                tipo_egreso: $('#inputTipoEgreso').val(),
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
    let tipo = $('#inputTipoEgreso').val();

    if (fecha && detalle && valor && tipo) {
        return true;
    } else {
        $('#formEgreso').addClass('was-validated');
        sendToast('error', 'Error', 'Complete los campos obligatorios.');
        return false;
    }

}

function validateFormEdit() {
    let fecha = $('#inputFechaEdit').val();
    let tipo = $('#inputTipoEgresoEdit').val();
    let detalle = $('#inputDetalleEdit').val();
    let valor = $('#inputValorEdit').val();


    if (fecha && detalle && valor && tipo) {
        return true;
    } else {
        $('#formCitaEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Complete los campos obligatorios.');
        return false;
    }

}

function resetForm() {
    $('#formEgreso').removeClass('was-validated');
    $('#inputTipoEgreso').val('');
    $('#inputFecha').val('');
    $('#inputDetalle').val('');
    $('#inputValor').val('');
}

function resetFormEdit() {
    $('#formEgreso').removeClass('was-validated');
    $('#inputFechaEdit').val('');
    $('#inputTipoEgresoEdit').val('');
    $('#inputDetalleEdit').val('');
    $('#inputValorEdit').val('');
}
