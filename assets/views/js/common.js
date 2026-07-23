let request;

$('#btnSalir').click(function (e) {
    const base_url = $('#btnSalir').attr('href');
    const action = base_url + 'login/startLogOut'
    e.preventDefault();
    window.location.href = base_url;
})

function showLoader(action) {
    let loader = document.getElementById('loader');

    if (action == true) {
        loader.classList.add('visible');
    } else {
        loader.classList.remove('visible');
    }

}

function isLoaderVisible() {
    let loader = document.getElementById('loader');
    return loader.classList.contains('visible');

}

function showLoaderFile(action) {
    let loader = document.getElementById('loader_file');

    if (action == true) {
        loader.classList.add('visible');
    } else {
        loader.classList.remove('visible');
    }

}

function getFormActionSliced(method) {
    var index = method.lastIndexOf('/');
    var resp = method.slice(0, index + 1);

    return resp
}

$('#inputBuscarPaciente').on("keyup", function () {
    let pacienteBuscar = $('#inputBuscarPaciente').val();

    if (request) {
        if (request.state() == 'pending') {
            request.abort()
            console.log('ABORTED')
        }
    }
    if (pacienteBuscar != '') {
        request = $.ajax({
            type: "POST",
            url: baseUrl + '/user/buscarPacientes',
            data: {
                paciente: pacienteBuscar
            },
            success: function (respuesta) {
                let resp = JSON.parse(respuesta);
                let childElement;
                $('#listPacientes').empty();
                resp.forEach(item => {
                    childElement = '<li value="' + item.idpaciente + '" class="list-group-item itemSrcPaciente">' + item.paciente + '</li>';
                    $('#listPacientes').append(childElement);
                })

                $('#listPacientes > li').click(function (e) {
                    verPaciente(this['value']);
                })

                $('#listPacientes').addClass('visible')
            }
        });
    } else {
        $('#listPacientes').removeClass('visible')
    }
});

function verPaciente(paciente) {
    window.location.href = baseUrl + '/user/ficha?pid=' + paciente
}