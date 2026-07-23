let baseUrl = $('#hdnBaseUrl').val();
let uploads = baseUrl + '/public/uploads/logo/';
const toast = new bootstrap.Toast(document.getElementById('customToast'));
let user = $('#srcUser').val();
var myModalElFirma = document.getElementById('modalFirma');
var modalFirma = bootstrap.Modal.getOrCreateInstance(myModalElFirma);

const canvas = document.getElementById("canvasFirma");
var context = canvas.getContext('2d');


// Configurar el suavizado de líneas
context.lineJoin = 'round';
context.lineCap = 'round';
let signaturePad;
let savedSignature;


$(document).ready(function (e) {
    obtieneDataUsuario();
    let ratio = 1.5;
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    if (viewportWidth <= 500) {
        ratio = 1;
    }
    canvas.width = 300 * ratio;
    canvas.height = 150 * ratio;
    signaturePad = new SignaturePad(canvas, {
        minWidth: 0.5,
        maxWidth: 2.5,
        penColor: "black",
        backgroundColor: "rgba(0,0,0,0)" // Asegurar fondo transparente
    });

})

function eliminarEscapes(string) {
    // Utilizamos una expresión regular para buscar y reemplazar todos los escapes y espacios en blanco
    return string.replace(/[\\ ]/g, '');
}


$('#btnResetFirma').click(function (e) {
    signaturePad.clear();
})

$('#btnFirma').click(function (e) {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/AdminUsuarios/getFirma',
        type: 'POST',
        data: {
            user: user
        },
        success: function (respuesta) {
            let data = JSON.parse(respuesta)
            showLoader(false);

            if (data[0].firma_url != "") {
                signaturePad.fromData(data[0].firma);
            }
        }
    });
    modalFirma.show();
})


$('#btnGuardarFirma').click(function (e) {
    let img = signaturePad.toDataURL(); // save image as PNG
    let data = signaturePad.toData();

    if (data.length > 0) {
        showLoader(true);
        $.ajax({
            url: baseUrl + '/AdminUsuarios/putSaveFirma',
            type: 'POST',
            data: {
                user: user,
                data: JSON.stringify(data),
                img: img
            },
            success: function (respuesta) {
                if (respuesta == 'true') {
                    sendToast('success', 'Firma personal', 'Firma guardada correctamente')
                } else {
                    sendToast('error', 'Firma personal', 'Error al guardar firma');
                }
                showLoader(false);
            }
        });
    } else {
        sendToast('info', 'Firma personal', 'Ingrese su firma para guardar')
    }
})

function validarPrefijoChile(numero) {
    const prefijo = "+56";
    return numero.startsWith(prefijo);
}


function obtieneDataUsuario() {
    $.ajax({
        url: baseUrl + '/AdminUsuarios/getDataUsuario',
        type: 'POST',
        data: {
            user: user,
        },
        success: function (respuesta) {
            resp = JSON.parse(respuesta)
            res = resp.data[0];

            $("#inputNombre").val(res.nombre);
            $("#inputMail").val(res.correo);
            $("#inputFono").val(res.fono);
            $("#inputOficina").val(res.oficina);
            $("#inputRrss").val(res.red_social);
            // $("#inputLogo").val(res.logo);

            if (res.logo) {
                $('#logo_enlace').show()
                $('#logo_enlace').attr('href', uploads + res.logo)
                console.log(res.logo)
            } else {
                $('#logo_enlace').hide()
            }

            showLoader(false);

        }
    });
}

$('#btnGuardar').click(function (e) {

    var formData = new FormData();
    let file = $('#inputLogo')[0].files[0];
    formData.append('file', file);
    formData.append('id_usuario', user);
    formData.append('nombre', $("#inputNombre").val());
    formData.append('mail', $("#inputMail").val());
    formData.append('fono', eliminarEspaciosEnBlanco($("#inputFono").val()));
    formData.append('oficina', $("#inputOficina").val());
    formData.append('redes', $("#inputRrss").val());

    if (validaForm()) {
        if (!file) {
            sendFormUsuario(formData)
        } else {
            let bytes_mb = (file.size / 1048576).toFixed(2);

            if (file.type != 'image/jpeg' && file.type != 'image/png') {
                sendToast('secondary', 'Error Archivo', 'Debe usar un archivo en formato JPEG o PNG');
            } else if (bytes_mb > 2) {
                sendToast('secondary', 'Error Archivo', 'El tamaño máximo permitido es 2MB');
            } else {
                sendFormUsuario(formData)
            }
        }
    }
})

function sendFormUsuario(formData) {
    showLoaderFile(true)
    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progress_bar').prop('aria-valuenow', percentComplete);
                    $('#progress_bar').css('width', percentComplete + '%');
                    if (percentComplete === 100) {
                        showLoaderFile(false);
                    }

                }
            }, false);

            return xhr;
        },
        url: baseUrl + '/AdminUsuarios/updateDataUsuario',
        type: 'POST',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (respuesta) {
            if (respuesta == 'true') {
                sendToast('secondary', 'Actualizar Datos', 'Datos Actualizados')
                setTimeout(reload, 2000);
            } else {
                sendToast('secondary', 'Actualizar Datos', 'Error al actualizar datos')
            }
            showLoader(false);
        }
    });
}

function eliminarEspaciosEnBlanco(texto) {
    return texto.split(' ').join('');
}


function reload() {
    location.reload()
}

function validaForm() {
    let nombre = $("#inputNombre").val();
    let mail = $("#inputMail").val();
    let fono = $("#inputFono").val();

    if (!validarPrefijoChile(fono)) {
        $('#formUsuario').addClass('was-validated');
        sendToast('error', 'Numero Telefono', 'El numero de teléfono debe comenzar en +56');
        return false;
    } else {
        if (nombre && mail) {
            return true;
        } else {
            $('#formUsuario').addClass('was-validated');
            sendToast('secondary', 'Error', 'Debe completar los datos obligatorios')
            return false;
        }
    }

}