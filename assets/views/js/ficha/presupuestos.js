var myModalNewPresupuesto = document.getElementById('modalPresupuesto');
var modalNewPresupuesto = bootstrap.Modal.getOrCreateInstance(myModalNewPresupuesto);

var myModalNewItemPresupuesto = document.getElementById('modalItemPresupuesto');
var modalNewItemPresupuesto = bootstrap.Modal.getOrCreateInstance(myModalNewItemPresupuesto);

var myModalNewItemPresupuestoVer = document.getElementById('modalItemPresupuestoVer');
var modalNewItemPresupuestoVer = bootstrap.Modal.getOrCreateInstance(myModalNewItemPresupuestoVer);

var myModalVerItemPresupuesto = document.getElementById('modalPresupuestoVer');
var modalItemPresupuestoVer = bootstrap.Modal.getOrCreateInstance(myModalVerItemPresupuesto);

var myModalPrestaciones = document.getElementById('modalPrestaciones');
var modalPrestaciones = bootstrap.Modal.getOrCreateInstance(myModalPrestaciones);


var src_desc = `<input type="text" class="form-control form-linear">`;
var src_diente = `<input type="text" class="form-control form-linear">`;
var src_obs = `<input type="text" class="form-control form-linear">`;
var src_valor = `<input type="text" class="form-control form-linear">`;

var src_desarrollo = `<select class="form-control form-linear">
                        <option value="Pendiente" selected>Pendiente</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Terminado">Terminado</option>
                    </select>`;

var src_pago = `<select class="form-control form-linear">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Pagado">Pagado</option>
                            </select>`;

var src_fecha = '<input type="date" class="form-control datepicker form-linear">';
let selectElement;


var table_presupuestos,table_prestaciones, table_items, table_items_ver, dataSetAddPresupuesto = [], dataSetAddPresupuestoVer = [], editor;
var selectedPresupuesto, userPrestaciones;

$(document).ready(function (e) {

    selectElement = document.querySelector(".form-edit");

    myModalNewPresupuesto.addEventListener('show.bs.modal', event => {
        resetNewPresupuestoForm();
    });

    myModalNewItemPresupuesto.addEventListener('show.bs.modal', event => {
        resetNewItemPresupuestoForm();
    });

    myModalNewItemPresupuestoVer.addEventListener('show.bs.modal', event => {
        resetNewItemPresupuestoFormVer();
    });

    table_prestaciones = $('#table_prestaciones').DataTable({
        "striped": true,
        "select": false,
        columns: [
            {data: 'idprestacion', visible: false},
            {data: 'descripcion'},
            {data: 'valor'},
        ],
        "bLengthChange": false,
        "bInfo": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function (settings, json) {
            showLoader(false);
        },
    })

    table_presupuestos = $('#table_presupuesto').DataTable({
        "select": true,
        columns: [
            {data: 'idpresupuesto', class: 'col-2'},
            {data: 'nombre'},
            {data: 'fecha'}
        ],
        "order": [[0, 'desc']],
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
        data: dataSetAddPresupuesto,
        columns: [
            {title: 'Descripcion', data: 'descripcion'},
            {title: 'Diente', data: 'diente'},
            {title: 'Observaciones', data: 'observaciones'},
            {title: 'Valor', data: 'valor', visible: false},
            {title: 'Valor', data: 'valor_txt'},
            {title: 'Desarrollo Tratamiento', data: 'desarrollo', visible: false},
            {title: 'Estado Pago', data: 'estado_pago', visible: false},
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

    table_items_ver = $('#table_items_ver').DataTable({
        data: dataSetAddPresupuestoVer,
        columns: [
            {title: 'Descripcion', data: 'descripcion',
                "render": function (data, type, row, meta) {
                    return src_desc;
                }
            },
            {title: 'Diente', data: 'diente',
                "render": function (data, type, row, meta) {
                    return src_diente;
                }
            },
            {
                title: 'Observaciones', data: 'observacion',
                "render": function (data, type, row, meta) {
                    return src_obs;
                }
            },
            {
                title: 'Valor', data: 'valor_format',
                "render": function (data, type, row, meta) {
                    return src_valor;
                }
            },
            {
                title: 'Desarrollo <br> Tratamiento', data: 'desarrollo', class: 'col-2',
                "render": function (data, type, row, meta) {
                    return src_desarrollo;
                }
            },
            {
                title: 'Estado Pago', data: 'estado_pago',
                "render": function (data, type, row, meta) {
                    return src_pago;
                }
            },
            {
                title: 'Fecha Pago', data: 'fecha_pago',
                "render": function (data, type, row, meta) {
                    return src_fecha;
                }
            }
        ],
        columnDefs: [
            {
                targets: 0,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData;
                    // Listener para cuando el input pierde foco
                    select.addEventListener('blur', (e) => {
                        select.value = select.value.replace(/['"]/g, '');
                        if (rowData.descripcion != select.value) {
                            rowData.descripcion = select.value;
                            cellData = rowData.descripcion;
                            let id_item = rowData.iditem_presupuesto;
                            modificarDescripcionItem(id_item, rowData.descripcion);
                        }
                    });
                    // Listener para cuando se presiona una tecla
                    select.addEventListener('keyup', (e) => {
                        // Verificar si la tecla presionada es Enter
                        if (e.key === 'Enter') {
                            select.blur();
                        }
                    });
                }
            },
            {
                targets: 1,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData;
                    // Listener para cuando el input pierde foco
                    select.addEventListener('blur', (e) => {
                        select.value = select.value.replace(/['"]/g, '');
                        if (rowData.diente != select.value) {
                            rowData.diente = select.value;
                            cellData = rowData.diente;
                            let id_item = rowData.iditem_presupuesto;
                            modificarDienteItem(id_item, rowData.diente);
                        }
                    });
                    // Listener para cuando se presiona una tecla
                    select.addEventListener('keyup', (e) => {
                        // Verificar si la tecla presionada es Enter
                        if (e.key === 'Enter') {
                            select.blur();
                        }
                    });
                }
            },
            {
                targets: 2,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData;
                    // Listener para cuando el input pierde foco
                    select.addEventListener('blur', (e) => {
                        select.value = select.value.replace(/['"]/g, '');
                        if (rowData.observacion != select.value) {
                            rowData.observacion = select.value;
                            cellData = rowData.observacion;
                            let id_item = rowData.iditem_presupuesto;
                            modificarObservItem(id_item, rowData.observacion);
                        }
                    });
                    // Listener para cuando se presiona una tecla
                    select.addEventListener('keyup', (e) => {
                        // Verificar si la tecla presionada es Enter
                        if (e.key === 'Enter') {
                            select.blur();
                        }
                    });
                }
            },
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData;
                    console.log(cellData)

                    select.addEventListener('focus', (e) => {
                        select.value = convertTotalesToInt(cellData);
                    });

                    // Listener para cuando el input pierde foco
                    select.addEventListener('blur', (e) => {
                        let number_value = select.value;
                        let new_value = convertMoneyToNumber(select.value)

                        cellData = new_value;
                        select.value = convertMoneyToNumber(new_value);
                        rowData.valor = number_value;
                        rowData.valor_format = new_value;

                        var dataset = table_items_ver.rows().data().toArray();
                        let subtotal = 0

                        dataset.forEach(function (row) {
                            subtotal += parseInt(row.valor);
                        });

                        $('#inputSubtotalEdit').val(subtotal);

                        let id_item = rowData.iditem_presupuesto;


                        updateTotalEdit();

                        modificarValorItem(id_item, number_value);

                    });

                    // Listener para cuando se presiona una tecla
                    select.addEventListener('keyup', (e) => {
                        // Verificar si la tecla presionada es Enter
                        if (e.key === 'Enter') {
                            select.blur();
                        }
                    });


                }
            },
            {
                targets: 4,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData;


                    select.addEventListener("change", function (e) {

                        switch (select.value) {
                            case "Pendiente":
                                this.classList.remove("select-warning");
                                this.classList.remove("select-success");
                                this.classList.add("select-danger");
                                break;
                            case "En Proceso":
                                this.classList.remove("select-danger");
                                this.classList.remove("select-success");
                                this.classList.add("select-warning");
                                break;
                            case "Terminado":
                                this.classList.remove("select-danger");
                                this.classList.remove("select-warning");
                                this.classList.add("select-success");
                                break;
                        }
                        select.blur();
                        modificarDesarrolloItem(rowData.iditem_presupuesto, select.value)
                    })
                }
            },
            {
                targets: 5,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData

                    select.addEventListener("change", function (e) {
                        switch (select.value) {
                            case "Pendiente":
                                this.classList.remove("select-danger");
                                this.classList.remove("Pagado-success");
                                this.classList.add("select-danger");
                                break;
                            case "Pagado":
                                this.classList.remove("select-danger");
                                this.classList.remove("select-success");
                                this.classList.add("select-success");
                                break;
                        }
                        select.blur();
                        modificarPagoItem(rowData.iditem_presupuesto, select.value)
                    })
                }
            },
            {
                targets: 6,
                createdCell: function (td, cellData, rowData, rowIdx, colIdx) {
                    let select = td.firstChild;
                    select.value = cellData

                    select.addEventListener("change", function (e) {
                        modificarFechaPagoItem(rowData.iditem_presupuesto, select.value)
                    })
                }
            }
        ],
        "rowCallback": function (row, data) {

            select_elements = row.getElementsByTagName("select");
            estado_pago = data.estado_pago;
            desarrollo = data.desarrollo;

            switch (desarrollo) {
                case "Pendiente":
                    select_elements[0].setAttribute("class", "form-select form-linear select-danger")
                    break;
                case "En Proceso":
                    select_elements[0].setAttribute("class", "form-select form-linear select-warning")
                    break;
                case "Terminado":
                    select_elements[0].setAttribute("class", "form-select form-linear select-success")
                    break;
            }

            switch (estado_pago) {
                case "Pendiente":
                    select_elements[1].setAttribute("class", "form-select form-linear select-danger")
                    break;
                case "Pagado":
                    select_elements[1].setAttribute("class", "form-select form-linear select-success")
                    break;
            }

        },
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


    table_presupuestos.on('select', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnMore').removeClass('d-none');
        }
    });

    table_presupuestos.on('deselect', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnMore').addClass('d-none');
        }
    });

});

$('#btnExportPrestaciones').click(function (e) {


    window.open(baseUrl + '/AdminPresupuesto/getUserPrestacionesExcel', '_blank');

    // $.ajax({
    //     url: baseUrl + '/AdminPresupuesto/getUserPrestacionesExcel',
    //     type: 'POST',
    //     success: function (result) {
    //         console.log(result)
    //     }
    // });
})

$('#filePrestaciones').change(function (e) {
    var file = e.target.files[0];
    var formData = new FormData();
    formData.append('file', file);

    $.ajax({
        url: baseUrl + '/AdminPresupuesto/uploadPrestaciones',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {


            if(result.resp == 'Prestaciones actualizadas.')
            {
                sendToast('success', 'Prestaciones', 'Prestaciones actualizadas correctamente')
                obtenerPrestaciones()
            }else{
                sendToast('error', 'Prestaciones', 'Error al actualizar prestaciones')
            }
        }
    });
})

$('#btnPrestaciones').click(function (e) {
    obtenerPrestaciones();
    modalPrestaciones.show();
})

function obtenerPrestaciones(){
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/getPrestaciones',
        type: 'POST',
        success: function (result) {
            res = JSON.parse(result);
            console.log(res);
            table_prestaciones.clear().draw();
            table_prestaciones.rows.add(res).draw();
            showLoader(false);
        }
    });
}

function obtenerPrestacionesForm(){
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/getPrestaciones',
        type: 'POST',
        success: function (result) {
            dataPrestaciones = JSON.parse(result);

            userPrestaciones = dataPrestaciones;

            $('#inputDescripciono').empty();
            opt = new Option('Escriba o Seleccione una prestación', '', true, true);
            $('#inputDescripciono').append(opt);
            dataPrestaciones.forEach(function (item) {
                let option = new Option(item.descripcion, item.descripcion);
                $('#inputDescripciono').append(option);
            })

            showLoader(false);
        }
    });
}

$('#btnAgregarItemPresupuestoVer').click(function (e) {
    if (validaFormItemPresupuestoVer()) {

        let selectedData = table_presupuestos.rows({selected: true}).data()[0];
        let idPresupuesto = selectedData.idpresupuesto;

        let descripcion = $('#inputDescripcionVer').val();
        let diente = $('#inputDienteVer').val();
        let observ = $('#inputObservacionVer').val();
        let valor = $('#inputValorVer').val();
        let desarrollo = "Pendiente";
        let estado = "Pendiente";
        let fecha = $('#inputFechaVer').val();
        let valor_txt = parseInt(valor).toLocaleString('es-ES');

        let itemAdd = {
            "descripcion": descripcion,
            "diente": diente,
            "observaciones": observ,
            "valor": valor,
            "valor_txt": '$' + valor_txt,
            "desarrollo": desarrollo,
            "estado_pago": estado,
            "fecha_pago": fecha
        };

        showLoader(true);

        $.ajax({
            url: baseUrl + '/AdminPresupuesto/addItemToPresupuesto',
            type: 'POST',
            data: {
                idPresupuesto: idPresupuesto,
                itemAdd: itemAdd
            },
            success: function (respuesta) {
                if (respuesta == '1') {

                    //RECARGAR TABLA Y DATOS
                    let selectedData = table_presupuestos.rows({selected: true}).data()[0];
                    idPresupuesto = selectedData.idpresupuesto;


                    $.ajax({
                        url: baseUrl + '/AdminPresupuesto/getDataPresupuesto',
                        type: 'POST',
                        data: {
                            idPresupuesto: idPresupuesto,
                        },
                        success: function (result) {
                            res = JSON.parse(result);

                            table_items_ver.clear().draw();
                            table_items_ver.rows.add(res.items).draw();

                            dataSetAddPresupuestoVer = res.items;

                            let total = parseInt(res.subtotal) + parseInt(res.descuento[0].descuento);
                            $('#inputEditNombrePresupuesto').val(res.nombre)
                            $('#inputDescuentoEdit').val(res.descuento[0].descuento);
                            $('#inputSubtotalEdit').val(res.subtotal_format);
                            $('#inputTotalEdit').val(res.total);
                            modalNewItemPresupuestoVer.hide();
                            showLoader(false);
                        }
                    });


                    sendToast('success', 'Item Presupuesto', 'Item agregado correctamente')

                } else {
                    showLoader(false);
                    sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
                }
            }
        });

    }
})

$('#btnModalNewItemPresupuestoVer').click(function (e) {
    modalNewItemPresupuestoVer.show();
})

$('#btnBorrarItemVer').click(function (e) {
    let selectedRows = table_items_ver.rows('.selected').data();

    if (selectedRows.length === 0) {
        sendToast('error', 'Eliminar item presupuesto', 'Seleccione un item presupuesto');
    } else {

        showLoader(true);

        let iditem_presupuesto = selectedRows[0].iditem_presupuesto;

        $.ajax({
            url: baseUrl + '/AdminPresupuesto/eliminarItemPresupuesto',
            type: 'POST',
            data: {
                iditem_presupuesto: iditem_presupuesto
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == '1') {

                    //RECARGAR TABLA Y DATOS
                    let selectedData = table_presupuestos.rows({selected: true}).data()[0];
                    idPresupuesto = selectedData.idpresupuesto;


                    $.ajax({
                        url: baseUrl + '/AdminPresupuesto/getDataPresupuesto',
                        type: 'POST',
                        data: {
                            idPresupuesto: idPresupuesto,
                        },
                        success: function (result) {
                            res = JSON.parse(result);

                            table_items_ver.clear().draw();
                            table_items_ver.rows.add(res.items).draw();

                            dataSetAddPresupuestoVer = res.items;

                            let total = parseInt(res.subtotal) + parseInt(res.descuento[0].descuento);
                            $('#inputEditNombrePresupuesto').val(res.nombre)
                            $('#inputDescuentoEdit').val(res.descuento[0].descuento);
                            $('#inputSubtotalEdit').val(res.subtotal_format);
                            $('#inputTotalEdit').val(res.total);
                            showLoader(false);
                        }
                    });

                    sendToast('success', 'Item Presupuesto', 'Item eliminado correctamente')

                } else {
                    sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
                }
            }
        });


    }

})

$('#btnBorrarItem').click(function (e) {

    let selectedRows = table_items.rows('.selected').data();

    if (selectedRows.length === 0) {
        sendToast('error', 'Eliminar item presupuesto', 'Seleccione un item presupuesto');
    } else {
        // Eliminar elementos seleccionados del dataset
        selectedRows.each(function (index) {
            var rowIndex = dataSetAddPresupuesto.findIndex(function (item) {
                return JSON.stringify(item) === JSON.stringify(index);
            });

            if (rowIndex !== -1) {
                dataSetAddPresupuesto.splice(rowIndex, 1);
            }
        });

        table_items.rows('.selected').remove().draw(false);

        console.log(dataSetAddPresupuesto);
    }

})

function modificarFechaPagoItem(id_item_elemento, valor) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemFechaPago',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Pago', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}

function modificarPagoItem(id_item_elemento, valor) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemPago',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Pago', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}

function modificarDesarrolloItem(id_item_elemento, valor) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemDesarrollo',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Desarrollo de traramiento', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}

function modificarDescripcionItem(id_item_elemento, valor){
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemDescripcion',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Presupuesto', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}


function modificarDienteItem(id_item_elemento, valor){
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemDiente',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Presupuesto', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}

function modificarObservItem(id_item_elemento, valor) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemObserv',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Presupuesto', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}

function modificarValorItem(id_item_elemento, valor) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminPresupuesto/editItemValor',
        type: 'POST',
        data: {
            id_item_elemento: id_item_elemento,
            valor: valor
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {
                sendToast('success', 'Presupuesto', 'Modificaion realizada correctamente')
                modalNewPresupuesto.hide()
            } else {
                sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            }
        }
    });
}

$('#btnUpdatePresupuesto').click(function (e) {

    if (validateFormEditPresupuesto()) {
        showLoader(true);

        let selectedData = table_presupuestos.rows({selected: true}).data()[0];

        let nombrePresupuesto = $('#inputEditNombrePresupuesto').val();
        let idPresupuesto = selectedData.idpresupuesto;
        let paciente = $('#srcPaciente').val();
        let subtotal = convertTotalesToInt($('#inputSubtotalEdit').val());
        let total = convertTotalesToInt($('#inputTotalEdit').val());

        $.ajax({
            url: baseUrl + '/AdminPresupuesto/updatePresupuesto',
            type: 'POST',
            data: {
                idPresupuesto: idPresupuesto,
                nombrePresupuesto: nombrePresupuesto,
                paciente: paciente,
                subtotal: subtotal,
                descuento: $('#inputDescuentoEdit').val(),
                total: total,
                items: dataSetAddPresupuestoVer,
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    sendToast('success', 'Nuevo Presupuesto', 'Presupuesto Agregado')
                    // obtieneDataUsuario(usuario)
                    modalNewPresupuesto.hide()
                } else {
                    sendToast('secondary', 'Error al agregar presupuesto', 'Consulte con el administrador de sistema')
                }
                // VERIFICAR SI ES NECESARIA ESTA FUNCION
                cargaDataPresupuesto();
                modalItemPresupuestoVer.hide();
            }
        });
    }
})

$('#btnMore').click(function (e) {

    let selectedData = table_presupuestos.rows({selected: true}).data()[0];
    idPresupuesto = selectedData.idpresupuesto;


    $.ajax({
        url: baseUrl + '/AdminPresupuesto/getDataPresupuesto',
        type: 'POST',
        data: {
            idPresupuesto: idPresupuesto,
        },
        success: function (result) {
            res = JSON.parse(result);

            table_items_ver.clear().draw();
            table_items_ver.rows.add(res.items).draw();

            dataSetAddPresupuestoVer = res.items;

            console.log(table_items_ver)
            console.log(dataSetAddPresupuestoVer)

            let total = parseInt(res.subtotal) + parseInt(res.descuento[0].descuento);
            $('#inputEditNombrePresupuesto').val(res.nombre)
            $('#inputDescuentoEdit').val(res.descuento[0].descuento);
            $('#inputSubtotalEdit').val(res.subtotal_format);
            $('#inputTotalEdit').val(res.total);

            showLoader(false);
            modalItemPresupuestoVer.show();
        }
    });

})


function cargaDataPresupuesto() {
    showLoader(true);

    $.ajax({
        url: $("#formGetPresupuesto").attr("action"),
        type: $("#formGetPresupuesto").attr("method"),
        data: {
            paciente: $("#srcPaciente").val(),
        },
        success: function (result) {
            showLoader(false);
            let res = JSON.parse(result);

            table_presupuestos.clear().draw();
            table_presupuestos.rows.add(res).draw();

        }
    });
}

function convertTotalesToInt(data) {
    let decimalString = data.replace('$', '');
    let decimalString2 = decimalString.replace('.', '');
    let entero = parseInt(decimalString2);
    return entero;
}

function convertTotalesToStr(data) {
    let valor_txt = '$' + parseInt(data).toLocaleString('es-ES');
    return valor_txt;
}

function convertMoneyToNumber(data) {
    let text = data.replace(/[.$]/g, '');
    let valor_txt = convertTotalesToStr(text);
    return valor_txt;
}


function resetNewPresupuestoForm() {
    $('#inputSubtotal').val(0)
    $('#inputDescuento').val(0)
    $('#inputTotal').val(0)
    dataSetAddPresupuesto = []
    table_items.clear().draw();

}

function resetNewItemPresupuestoForm() {
    // $('#inputDescripcion').val('');
    $('#inputDescripciono').val('');
    $('#inputDiente').val('');
    $('#inputObservacion').val('');
    $('#inputValor').val('0');
    $('#inputDesarrollo').val('Pendiente');
    $('#inputEstado').val('Pendiente');
    $('#inputFecha').val('');

}

function resetNewItemPresupuestoFormVer() {
    $('#inputDescripcionVer').val('');
    $('#inputDienteVer').val('');
    $('#inputObservacionVer').val('');
    $('#inputValorVer').val('0');
    $('#inputFechaVer').val('');
}

$('#inputDescripciono').select2({
    dropdownParent: $('#modalItemPresupuesto'),
    placeholder: "Escriba o Seleccione una prestación",
    allowClear: true,
    width: 'resolve',
    language: {
        noResults: function () {
            return "No se encontraron resultados"; // Cambia el texto aquí
        }
    },
    tags: true, // Permite agregar texto personalizado como opciones
    createTag: function (params) {
        // Personaliza la forma en que se crean etiquetas nuevas
        return {
            id: params.term,
            text: params.term,
            isNew: true // Indicador de que esta opción fue escrita
        };
    }
});

// Callback al seleccionar una opción
$('#inputDescripciono').on('select2:select', function (e) {
    const data = e.params.data;
    if (data.isNew) {
        console.log("Nuevo texto ingresado:", data.text);
    } else {
        prestacion = userPrestaciones.find(prestacion => prestacion.descripcion === data.text)

        if (prestacion.valor_int !== '') {
            $('#inputValor').val(prestacion.valor_int);
        } else {
            $('#inputValor').val(0);
        }
    }
});

$('#btnAddPresupuesto').click(function (e) {
    obtenerPrestacionesForm();
    modalNewPresupuesto.show();
})

$('#btnModalNewItemPresupuesto').click(function (e) {
    modalNewItemPresupuesto.show();
})

$('#btnAgregarItemPresupuesto').click(function (e) {

    if (validaFormItemPresupuesto()) {
        // let descripcion = $('#inputDescripcion').val();
        let descripcion = $('#inputDescripciono').val();
        let diente = $('#inputDiente').val();
        let observ = $('#inputObservacion').val();
        let valor = $('#inputValor').val();
        let desarrollo = "Pendiente";
        let estado = "Pendiente";
        let fecha = $('#inputFecha').val();
        let valor_txt = parseInt(valor).toLocaleString('es-ES');

        let itemAdd = {
            "descripcion": descripcion,
            "diente": diente,
            "observaciones": observ,
            "valor": valor,
            "valor_txt": '$' + valor_txt,
            "desarrollo": desarrollo,
            "estado_pago": estado,
            "fecha_pago": fecha
        };

        dataSetAddPresupuesto.push(itemAdd);
        table_items.clear().draw();
        table_items.rows.add(dataSetAddPresupuesto).draw();

        modalNewItemPresupuesto.hide();
        updateSubtotal();
        sendToast('secondary', 'Presupuesto', 'Item Agregado')
    }
})

$('#btnGuardarPresupuesto').click(function (e) {

    if (validateFormAddPresupuesto()) {
        showLoader(true);
        let nombrePresupuesto = $('#inputNombrePresupuesto').val();
        let paciente = $('#srcPaciente').val();
        let subtotal = convertTotalesToInt($('#inputSubtotal').val());
        let total = convertTotalesToInt($('#inputTotal').val());

        $.ajax({
            url: $("#formPresupuesto").attr("action"),
            type: $("#formPresupuesto").attr("method"),
            data: {
                nombrePresupuesto: nombrePresupuesto,
                paciente: paciente,
                subtotal: subtotal,
                descuento: $('#inputDescuento').val(),
                total: total,
                items: dataSetAddPresupuesto,
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    sendToast('success', 'Nuevo Presupuesto', 'Presupuesto Agregado')
                    // obtieneDataUsuario(usuario)
                    modalNewPresupuesto.hide()
                } else {
                    sendToast('secondary', 'Error al agregar presupuesto', 'Consulte con el administrador de sistema')
                }
                cargaDataPresupuesto();
            }
        });
    }
});

$('#btn_pdf').click(function (e) {
    let selectedData = table_presupuestos.rows({selected: true}).data()[0];
    idPresupuesto = selectedData.idpresupuesto;
    window.open(baseUrl + '/PdfFactory/generaPdfPresupuesto?idp=' + idPresupuesto, "_blank");
})

$('#btn_mail').click(function (e) {
    let selectedData = table_presupuestos.rows({selected: true}).data()[0];
    idPresupuesto = selectedData.idpresupuesto;
    window.open(baseUrl + '/PdfFactory/sendPresupuesto?idp=' + idPresupuesto, "_blank");
})

function validateFormAddPresupuesto() {
    let nombrePresupuesto = $('#inputNombrePresupuesto').val();
    let items = dataSetAddPresupuesto.length;
    let subtotal = convertTotalesToInt($('#inputSubtotal').val());
    let total = convertTotalesToInt($('#inputTotal').val());

    if (!nombrePresupuesto) {
        $('#formPresupuesto').addClass('was-validated');
        sendToast('error', 'Error', 'Debe Ingresar el nombre del presupuesto.');
        return false;
    } else if (items > 0 && subtotal >= 0 && total >= 0) {
        return true;
    } else {
        $('#formPresupuesto').addClass('was-validated');
        sendToast('error', 'Error', 'Debe Ingresar al menos un item al presupuesto.');
        return false;
    }

}

function validateFormEditPresupuesto() {
    let nombrePresupuestoEdit = $('#inputEditNombrePresupuesto').val();
    let items = dataSetAddPresupuestoVer.length;
    let subtotal = convertTotalesToInt($('#inputSubtotal').val());
    let total = convertTotalesToInt($('#inputTotal').val());

    if (nombrePresupuestoEdit === '') {
        $('#formPresupuestoEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Debe Ingresar el nombre del presupuesto.');
        return false;
    } else if (items > 0 && subtotal >= 0 && total >= 0) {
        return true;
    } else {
        $('#formPresupuestoEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Debe Ingresar al menos un item al presupuesto.');
        return false;
    }
}


function validaFormItemPresupuesto() {
    // let descripcion = $('#inputDescripcion').val();
    let descripcion = $('#inputDescripciono').val();
    let diente = $('#inputDiente').val();
    let valor = $('#inputValor').val();
    let res;

    if (descripcion && diente && valor) {
        res = true;
    } else {
        $('#formItemPresupuesto').addClass('was-validated');
        sendToast('error', 'Item Presupuesto', 'Complete los campos obligatorios')
        res = false;
    }

    return res;

}

function validaFormItemPresupuestoVer() {
    let descripcion = $('#inputDescripcionVer').val();
    let diente = $('#inputDienteVer').val();
    let valor = $('#inputValorVer').val();
    let res;

    if (descripcion && diente && valor) {
        res = true;
    } else {
        $('#formItemPresupuestoVer').addClass('was-validated');
        sendToast('error', 'Item Presupuesto', 'Complete los campos obligatorios')
        res = false;
    }
    return res;
}

function updateSubtotal() {

    let subtotal = 0;
    let subvalor = 0;
    dataSetAddPresupuesto.forEach(item => {
        subvalor = item.valor ? item.valor : 0;
        subtotal = subtotal + parseInt(subvalor)
    })

    let converted = convertTotalesToStr(subtotal)

    $('#inputSubtotal').val(converted);

    updateTotal();
}

function updateTotal() {
    let subtotal = convertTotalesToInt($("#inputSubtotal").val());
    let descuento = $("#inputDescuento").val();
    let total = subtotal - (subtotal * (descuento / 100));
    // let total = subtotal - descuento;

    let convertedTotal = convertTotalesToStr(total)
    $('#inputTotal').val(convertedTotal);
}

function updateTotalEdit() {
    let subtotal = convertTotalesToInt($("#inputSubtotalEdit").val());
    let descuento = $("#inputDescuentoEdit").val();
    let total = subtotal - (subtotal * (descuento / 100));
    // let total = subtotal - descuento;

    let convertedTotal = convertTotalesToStr(total)
    $('#inputTotalEdit').val(convertedTotal);
}

$("#inputDescuento").bind('keyup mouseup', function (e) {

    if ($("#inputDescuento").val() > 100) {
        $("#inputDescuento").val(100)
    } else if ($("#inputDescuento").val() < 0) {
        $("#inputDescuento").val(0)
    }

    e.preventDefault();
    updateTotal()
});


$("#inputDescuento").focusout(function (e) {
    if ($("#inputDescuento").val() > 100) {
        $("#inputDescuento").val(100)
    } else if ($("#inputDescuento").val() < 0) {
        $("#inputDescuento").val(0)
    }
})


$("#inputDescuentoEdit").bind('keyup mouseup', function (e) {

    if (e.key === '.') {
        e.preventDefault();
    }


    if ($("#inputDescuentoEdit").val() > 100) {
        $("#inputDescuentoEdit").val(100)
    } else if ($("#inputDescuentoEdit").val() < 0) {
        $("#inputDescuentoEdit").val(0)
    }

    e.preventDefault();
    updateTotalEdit();
});


$("#inputDescuentoEdit").focusout(function (e) {

    if ($("#inputDescuentoEdit").val() > 100) {
        $("#inputDescuentoEdit").val(100)
    } else if ($("#inputDescuentoEdit").val() < 0) {
        $("#inputDescuentoEdit").val(0)
    }
})
