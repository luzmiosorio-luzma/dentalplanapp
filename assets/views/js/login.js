const toast = new bootstrap.Toast(document.getElementById('customToast'));
let baseUrl = $('#base_url').val();
const err_type = $('#err_type').attr('value');

$(document).ready(function (e) {
    $('#loginForm').addClass('animateform');

    if (err_type == 1){
        sendToast('error', 'Login Error', 'Usuario o conntraseña inválidos.');
    }

})

$('#btnLogin').click(function (e) {
    e.preventDefault();
    showLoader(true);

    let email = $('#form-email').val();
    let password = $('#form-password').val();
    if (email && password) {
        $( "#loginForm" ).submit();
    } else {
        showLoader(false);
        sendToast('error', 'Login Error', 'Debe ingresar sus credenciales.');
    }

});

$('#btnRecover').click(function (e) {
    e.preventDefault();
    showLoader(true);

    let email = $('#form-email').val();

    if (email) {
        $.ajax({
            url: baseUrl + '/recover',
            type: 'POST',
            data: {
                email: email,
            },
            success: function(data) {
                let result = JSON.parse(data);
                if (result.result === 'success'){
                    sendToast('success', 'Recuperar contraseña', 'Hemos enviado un correo de recuperacion a su email.');
                }else{
                    sendToast('error', 'Error', 'El correo ingresado no esta registrado en nuestros sistemas.');
                }

                showLoader(false);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                showLoader(false);
            }
        });
    } else {
        showLoader(false);
        sendToast('error', 'Error', 'Ingrese su correo.');
    }

})