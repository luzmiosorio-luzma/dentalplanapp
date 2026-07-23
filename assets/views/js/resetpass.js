const toast = new bootstrap.Toast(document.getElementById('customToast'));
let baseUrl = $('#base_url').val();

$(document).ready(function (e) {

})

$('#btnGuardar').click(function(e){

    if (validaForm()){
        showLoader(true);
        let validationUser = getUserInfo();
        let pass = $('#inputPassword').val();

        $.ajax({
            url: baseUrl + '/saveresetpass',
            type: 'POST',
            data: {
                pass: pass,
                validationUser: validationUser
            },
            success: function(data) {
                let result = JSON.parse(data);

                if (result[0] === 'success'){
                    sendToast('success', 'Recuperar contraseña', 'Contraseña actualizada.');
                }else{
                    sendToast('error', 'Error', 'Hubo un error actualizando su contraseña, intente nuevamente abriendo el enlace desde su correo.');
                }

                showLoader(false);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                sendToast('error', 'Error', 'Hubo un error actualizando su contraseña, intente nuevamente abriendo el enlace desde su correo.');
                showLoader(false);
            }
        });
    }

})
function getUserInfo(){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let validatioUser = urlParams.get('vu');

    return validatioUser;
}

function validaForm(){
    let pass = $('#inputPassword').val();
    let passTwo = $('#inputPasswordTwo').val();

    if (pass && passTwo && pass === passTwo){
        return true;
    }else{
        sendToast('error', 'Error', 'Debe ingresar la contraseña, la confirmación y deben ser iguales.');
        return false;
    }

}
