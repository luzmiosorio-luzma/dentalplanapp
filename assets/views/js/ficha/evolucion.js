var myModalNewEvolucion = document.getElementById('modalEvolucion');
var modalNewEvolucion = bootstrap.Modal.getOrCreateInstance(myModalNewEvolucion);

$(document).ready(function (e) {

    myModalNewEvolucion.addEventListener('show.bs.modal', event => {
        resetFormEvolucion();
    });

});


$('#btnAddEvolucion').click(function (e) {
    modalNewEvolucion.show();
})

$('#btnGuardarEvolucion').click(function (e) {
    let detalle = $('#inputEvolucion').val();
    let paciente = $('#srcPaciente').val();
    let usuario = $('#srcUser').val();

    if (detalle) {
        showLoader(true);
        $.ajax({
            url: baseUrl + '/UserPaciente/fichaSetEvolucion',
            type: 'POST',
            data: {
                detalle: detalle,
                usuario: usuario,
                paciente: paciente
            },
            success: function (respuesta) {
                showLoader(false);
                console.log(respuesta)
                if (respuesta === '1') {
                    sendToast('success', 'Evolución Clínica', 'Registro Agregado.')
                    modalNewEvolucion.hide()
                } else {
                    sendToast('secondary', 'Evolución Clínica', 'Error, Consulte con el administrador de sistema')
                }
                cargaDataEvolucion();
            }
        });
    } else {
        $('#formEvolucion').addClass('was-validated');
    }
})

function resetFormEvolucion() {
    $('#formEvolucion').removeClass('was-validated');
    $('#inputEvolucion').val('');
}

function cargaDataEvolucion() {
    showLoader(true);
    let paciente = $('#srcPaciente').val();
    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetEvolucion',
        type: 'POST',
        data: {
            paciente: paciente
        },
        success: function (respuesta) {
            data = JSON.parse(respuesta);

            let evolucion_container_el = $('#evolucion_container');

            evolucion_container_el.empty();

            if (data.length > 0){
                data.forEach(ele => {
                    item = `<div class="evo_container col-12 d-flex flex-column align-items-center justify-content-center n-box n-border py-3 my-2">
                        <span class="w-100 px-3 evo_especialisa text-left fw-bold">` + ele.nombre + ` - ` + ele.fecha + `</span>
                        <span class="w-100 px-3 evo_detalle">` + ele.detalle + ` </span></div>`;

                    evolucion_container_el.append(item);
                });
            }else{
                item = '<div class="evo_container col-12 d-flex flex-column align-items-center justify-content-center n-box n-border  py-3">\n' +
                    '                <h5>El paciente no tiene registros de evolución clínica</h5>\n' +
                    '            </div>'
                evolucion_container_el.append(item);
            }
            showLoader(false);
        }
    });
}