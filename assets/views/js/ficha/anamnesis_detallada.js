var el_modal_uno = document.getElementById('modalAnamnesisUno');
var anam_modal_uno = bootstrap.Modal.getOrCreateInstance(el_modal_uno);

var el_modal_dos = document.getElementById('modalAnamnesisDos');
var anam_modal_dos = bootstrap.Modal.getOrCreateInstance(el_modal_dos);

var el_modal_tres = document.getElementById('modalAnamnesisTres');
var anam_modal_tres = bootstrap.Modal.getOrCreateInstance(el_modal_tres);

var el_modal_cuatro = document.getElementById('modalAnamnesisCuatro');
var anam_modal_cuatro = bootstrap.Modal.getOrCreateInstance(el_modal_cuatro);

var el_modal_cinco = document.getElementById('modalAnamnesisCinco');
var anam_modal_cinco = bootstrap.Modal.getOrCreateInstance(el_modal_cinco);

var el_modal_seis = document.getElementById('modalAnamnesisSeis');
var anam_modal_seis = bootstrap.Modal.getOrCreateInstance(el_modal_seis);

var el_modal_siete = document.getElementById('modalAnamnesisSiete');
var anam_modal_siete = bootstrap.Modal.getOrCreateInstance(el_modal_siete);

var el_modal_ocho = document.getElementById('modalAnamnesisOcho');
var anam_modal_ocho = bootstrap.Modal.getOrCreateInstance(el_modal_ocho);

var el_modal_nueve = document.getElementById('modalAnamnesisNueve');
var anam_modal_nueve = bootstrap.Modal.getOrCreateInstance(el_modal_nueve);

$(document).ready(function (e) {

});


$('#btnAnamUno').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 1, anam_modal_uno);
    }

})


$('#btnAnamDos').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 2, anam_modal_dos);
    }
})

$('#btnAnamTres').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 3, anam_modal_tres);
    }
})

$('#btnAnamCuatro').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 4, anam_modal_cuatro);
    }
})

$('#btnAnamCinco').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 5, anam_modal_cinco);
    }
})

$('#btnAnamSeis').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 6, anam_modal_seis);
    }
})

$('#btnAnamSiete').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 7, anam_modal_siete);
    }
})

$('#btnAnamOcho').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 8, anam_modal_ocho);
    }
})

$('#btnAnamNueve').click(function (e) {
    let isCollapsed = $(this).hasClass('collapsed')
    let container_name = $(this).attr('nexed');

    if (isCollapsed === false) {
        loadAnamnesisSection(container_name, 9, anam_modal_nueve);
    }
})


// ####################################################################################

$('#btnAddAnamUno').click(function (e) {
    resetFormAnam('formAnamUno');
    anam_modal_uno.show();
})

$('#btnAddAnamDos').click(function (e) {
    resetFormAnam('formAnamDos');
    anam_modal_dos.show();
})

$('#btnAddAnamTres').click(function (e) {
    resetFormAnam('formAnamTres');
    anam_modal_tres.show();
})

$('#btnAddAnamTres').click(function (e) {
    resetFormAnam('formAnamTres');
    anam_modal_tres.show();
})

$('#btnAddAnamCuatro').click(function (e) {
    resetFormAnam('formAnamCuatro');
    anam_modal_cuatro.show();
})

$('#btnAddAnamCinco').click(function (e) {
    resetFormAnam('formAnamCinco');
    anam_modal_cinco.show();
})

$('#btnAddAnamSeis').click(function (e) {
    resetFormAnam('formAnamSeis');
    anam_modal_seis.show();
})

$('#btnAddAnamSiete').click(function (e) {
    resetFormAnam('formAnamSiete');
    anam_modal_siete.show();
})

$('#btnAddAnamOcho').click(function (e) {
    resetFormAnam('formAnamOcho');
    anam_modal_ocho.show();
})

$('#btnAddAnamNueve').click(function (e) {
    resetFormAnam('formAnamNueve');
    anam_modal_nueve.show();
})

// ####################################################################################


$('#btnGuardarAnamUno').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamUno')) {

        let desc = $('#inputAnamUno').val();
        let fecha = $('#fechaAnamUno').val();
        let tipo = 1;
        let container_name = 'detalles-container-uno';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_uno, container_name);
    }
})

$('#btnGuardarAnamDos').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamDos')) {

        let desc = $('#inputAnamDos').val();
        let fecha = $('#fechaAnamDos').val();
        let tipo = 2;
        let container_name = 'detalles-container-dos';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_dos, container_name);
    }
})

$('#btnGuardarAnamTres').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamTres')) {

        let desc = $('#inputAnamTres').val();
        let fecha = $('#fechaAnamTres').val();
        let tipo = 3;
        let container_name = 'detalles-container-tres';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_tres, container_name);
    }
})

$('#btnGuardarAnamCuatro').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamCuatro')) {

        let desc = $('#inputAnamCuatro').val();
        let fecha = $('#fechaAnamCuatro').val();
        let tipo = 4;
        let container_name = 'detalles-container-cuatro';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_cuatro, container_name);
    }
})

$('#btnGuardarAnamCinco').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamCinco')) {

        let desc = $('#inputAnamCinco').val();
        let fecha = $('#fechaAnamCinco').val();
        let tipo = 5;
        let container_name = 'detalles-container-cinco';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_cinco, container_name);
    }
})

$('#btnGuardarAnamSeis').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamSeis')) {

        let desc = $('#inputAnamSeis').val();
        let fecha = $('#fechaAnamSeis').val();
        let tipo = 6;
        let container_name = 'detalles-container-seis';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_seis, container_name);
    }
})

$('#btnGuardarAnamSiete').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamSiete')) {

        let desc = $('#inputAnamSiete').val();
        let fecha = $('#fechaAnamSiete').val();
        let tipo = 7;
        let container_name = 'detalles-container-siete';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_siete, container_name);
    }
})

$('#btnGuardarAnamOcho').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamOcho')) {

        let desc = $('#inputAnamOcho').val();
        let fecha = $('#fechaAnamOcho').val();
        let tipo = 8;
        let container_name = 'detalles-container-ocho';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_ocho, container_name);
    }
})

$('#btnGuardarAnamNueve').click(function (e) {
    showLoader(true);
    if (validaFormAnam('formAnamNueve')) {

        let desc = $('#inputAnamNueve').val();
        let fecha = $('#fechaAnamNueve').val();
        let tipo = 9;
        let container_name = 'detalles-container-nueve';

        saveDetalleAnamnesis(desc, fecha, tipo, anam_modal_nueve, container_name);
    }
})

// ####################################################################################


function resetFormAnam(formname) {
    let form = $('#' + formname + ' :input');
    form[0].value = '';
    form[1].value = '';
}

function validaFormAnam(formname) {
    let usuario = $('#srcUser').val()

    let form = $('#' + formname + ' :input');
    let desc = form[0].value;
    let fecha = form[1].value;

    if (desc && fecha) {
        return true;
    } else {
        showLoader(false);
        $('#' + formname).addClass('was-validated');
        sendToast('error', 'Error', 'Debe completar los datos obligatorios.');
    }

}


function saveDetalleAnamnesis(desc, fecha, tipo, modal, container_name) {
    $.ajax({
        url: $("#formAnamUno").attr("action"),
        type: 'POST',
        data: {
            paciente: $('#srcPaciente').val(),
            desc: desc,
            fecha: fecha,
            tipo: tipo
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == '1') {

                modal.hide()
                loadAnamnesisSection(container_name, tipo, modal);

                sendToast('success', 'Registrar Anamnesis Detallada', 'Registro completo.');
            } else {
                sendToast('error', 'Registrar Anamnesis Detallada', 'Error Registro.');
            }
        }
    });
}

function loadAnamnesisSection(container_name, tipo, modal) {
    showLoader(true);
    let container = $('#' + container_name);

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetAnamnesisDetalle',
        type: 'POST',
        data: {
            paciente: $('#srcPaciente').val(),
            tipo: tipo
        },
        success: function (respuesta) {
            showLoader(false);

            data = JSON.parse(respuesta)
            container.empty();
            data.forEach(comm => {

                let el = `<div  class="alert alert-dark d-flex flex-column align-items-start justify-content-start" role="alert">
                                <span>${comm.usuario} | ${comm.fecha}</span>
                                <p>${comm.detalle}</p>
                            </div>`;

                container.append(el);
            });

            modal.hide()
            showLoader(false);
        }
    });
}
