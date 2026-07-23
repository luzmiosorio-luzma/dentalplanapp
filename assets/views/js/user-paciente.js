let baseUrl = $('#hdnBaseUrl').val();
var myModalEl = document.getElementById('modalPaciente');
var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);
var myModalEdit = document.getElementById('modalPacienteEdit');
var modalEdit = bootstrap.Modal.getOrCreateInstance(myModalEdit);
const toast = new bootstrap.Toast(document.getElementById('customToast'));
var table;

$(document).ready(function (e) {
    myModalEl.addEventListener('show.bs.modal', event => {
        resetForm();
    });

    table = $('#table_paciente').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {data: 'idpaciente', visible: false},
            {data: 'nombre'},
            {data: 'rut'},
            {data: 'edad'},
            {data: 'sexo'},
            {data: 'fono'},
            {data: 'mail'},
            {data: 'direccion'},
            {data: 'prevision'},
            {data: 'idsexo', visible: false},
            {data: 'nacionalidad', visible: false},
        ],
        "order": [[1, 'asc']],
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
            $('#btnGoFicha').removeClass('d-none');
        }
    });

    table.on('deselect', function (e, dt, type, indexes) {
        if (type === 'row') {
            $('#btnEdit').addClass('d-none');
            $('#btnGoFicha').addClass('d-none');
        }
    });

    let usuario = $('#srcUser').val();

    if (usuario) {
        obtieneDataUsuario(usuario);
    }

    showLoader(false);
});

$('#btnGoFicha').click(function (e) {
    let selectedData = table.rows({selected: true}).data()[0];
    let idp = selectedData.idpaciente;
    window.location = baseUrl + '/user/ficha?pid=' + idp
})

function validateForm() {
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

function resetForm() {
    $('#formPaciente').removeClass('was-validated');
    $('#inputNombre').val('');
    $('#inputNacionalidad').val('1');
    $('#inputRut').val('');
    $('#inputEdad').val('');
    $('#inputSexo').val('');
    $('#inputFono').val('');
    $('#inputCorreo').val('');
    $('#inputDireccion').val('');
    $('#inputPrev').val('');
}

function validateFormEdit() {
    let nombre = $('#inputNombreEdit').val();
    let rut = $('#inputRutEdit').val();
    let usuario = $('#srcUser').val();

    if (usuario && nombre && rut) {
        let nacionalidad = $('#inputNacionalidadEdit').val();

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
        $('#formPacienteEdit').addClass('was-validated');
        sendToast('error', 'Error', 'Debe completar los campos obligatorios.');
        return false;
    }

}

function resetFormEdit() {
    $('#formPacienteEdit').removeClass('was-validated');
    $('#inputNombreEdit').val('');
    $('#inputRutEdit').val('');
    $('#inputEdadEdit').val('');
    $('#inputSexoEdit').val('');
    $('#inputFonoEdit').val('');
    $('#inputCorreoEdit').val('');
    $('#inputDireccionEdit').val('');
    $('#inputPrevEdit').val('');
}

function obtieneDataUsuario(usuario) {
    showLoader(true)
    $.ajax({
        url: $("#formGetPaciente").attr("action"),
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

$('#btnGuardarPaciente').click(function (e) {
    if (validateForm()) {
        showLoader(true);
        let usuario = $('#srcUser').val();
        let nacionalidad = $('#inputNacionalidad').val();
        let rut = $('#inputRut').val();

        if (nacionalidad === "1") {
            rut = formatRUT(rut);
        }

        $.ajax({
            url: $("#formPaciente").attr("action"),
            type: $("#formPaciente").attr("method"),
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
                showLoader(false);
                if (respuesta == 'true') {
                    sendToast('success', 'Nuevo Paciente', 'Paciente Agregado')
                    obtieneDataUsuario(usuario)
                    modal.hide()
                } else {
                    res = JSON.parse(respuesta);

                    if(res.status === 'error'){
                        sendToast('secondary', 'Error al agregar paciente', res.message)
                    }else {
                        sendToast('secondary', 'Error al agregar paciente', 'Consulte con el administrador de sistema')
                    }
                }
            }
        });
    }
});

function esNumero(caracter) {
    return caracter >= '0' && caracter <= '9';
}


function formatRUT(rut) {
    let valor = rut.replace(/[^0-9kK]+/g, '').toUpperCase();

    let resultado = agregarGuionYFormatearNumero(valor);

    console.log(resultado)

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


    console.log(dvEsperado, dv)
    // Verificar DV
    if (dvEsperado != dv) {
        return false;
    }

    // Si todo está correcto
    return true;
}

$('#btnGuardarPacienteEdit').click(function (e) {

    let validaForm = validateFormEdit();
    if (validaForm) {
        showLoader(true);

        let usuario = $('#srcUser').val();
        let selectedData = table.rows({selected: true}).data()[0];

        $.ajax({
            url: $("#formPacienteEdit").attr("action"),
            type: $("#formPacienteEdit").attr("method"),
            data: {
                idpaciente: selectedData.idpaciente,
                nombre: $('#inputNombreEdit').val(),
                rut: $('#inputRutEdit').val(),
                edad: $('#inputEdadEdit').val(),
                sexo: $('#inputSexoEdit').val(),
                fono: $('#inputFonoEdit').val(),
                mail: $('#inputCorreoEdit').val(),
                direccion: $('#inputDireccionEdit').val(),
                prevision: $('#inputPrevEdit').val(),
                nacionalidad: $('#inputNacionalidadEdit').val()
            },
            success: function (respuesta) {
                showLoader(false);
                if (respuesta == 'true') {
                    sendToast('success', 'Modificar Paciente', 'Paciente Modificado')
                    obtieneDataUsuario(usuario)
                    modalEdit.hide()
                } else {
                    sendToast('secondary', 'Error al agregar paciente', 'Consulte con el administrador de sistema')
                }
            }
        });
    }
});

$('#btnAddPaciente').click(function (e) {
    resetForm();
    modal.show();
});

$('#btnEdit').click(function (e) {
    resetFormEdit();
    let selectedData = table.rows({selected: true}).data()[0];

    $('#inputNombreEdit').val(selectedData.nombre);
    $('#inputRutEdit').val(selectedData.rut);
    $('#inputEdadEdit').val(selectedData.edad);
    $('#inputSexoEdit').val(selectedData.idsexo);
    $('#inputFonoEdit').val(selectedData.fono);
    $('#inputCorreoEdit').val(selectedData.mail);
    $('#inputDireccionEdit').val(selectedData.direccion);
    $('#inputPrevEdit').val(selectedData.prevision);
    $('#inputNacionalidadEdit').val(selectedData.nacionalidad);

    modalEdit.show();
});