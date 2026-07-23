$('#btnGuardarAnamnesisCorta').click(function (e) {
    let paciente = $('#srcPaciente').val();
    let historia = $('#inputHistoria').val();
    let farmacos = $('#inputFarmacos').val();
    let habitos = $('#inputHabitos').val();
    let motivo = $('#inputMotivo').val();
    let diagnostico = $('#inputDiagnostico').val();
    let observaciones = $('#inputObs').val();
    let alertas = $('#inputAlertas').val();

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaSetAnamnesisCorta',
        type: 'POST',
        data: {
            paciente: paciente,
            historia: historia,
            farmacos: farmacos,
            habitos: habitos,
            motivo: motivo,
            diagnostico: diagnostico,
            observaciones: observaciones,
            alertas: alertas
        },
        success: function (respuesta) {
            showLoader(false);
            if (respuesta == 1) {
                sendToast('success', 'Anamnesis Corta', 'Actualización completa')
            } else {
                sendToast('secondary', 'Anamnesis Corta', 'Error')
            }
            obieneDataAnamnesisCorta(true);
        }
    });
})


function obieneDataAnamnesisCorta(aviso){
    showLoader(true);
    let paciente = $('#srcPaciente').val();

    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetAnamnesisCorta',
        type: 'POST',
        data: {
            paciente: paciente
        },
        success: function (respuesta) {
            showLoader(false);

            res = JSON.parse(respuesta);
            if (res.length == 1) {
                $('#inputHistoria').val(res[0].historia_clinica);
                $('#inputFarmacos').val(res[0].farmacos);
                $('#inputHabitos').val(res[0].habitos);
                $('#inputMotivo').val(res[0].motivo);
                $('#inputDiagnostico').val(res[0].diagnostico);
                $('#inputObs').val(res[0].observaciones);
                $('#inputAlertas').val(res[0].alertas);

                if (aviso == true){
                    sendToast('success', 'Anamnesis Corta', 'Datos Sincronizados.');
                }
            }else if (res == ''){

            } else {
                sendToast('secondary', 'Anamnesis Corta', 'Error Carga Anamnesis.')
            }
        }
    });
}