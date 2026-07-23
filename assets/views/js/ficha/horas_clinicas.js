let table_horas;
let datasetHoras;

table_horas = $('#table_horas').DataTable({
    select: {
        style: 'single'
    },
    columns: [
        {title: 'id', data: 'id', visible: false},
        {title: 'Fecha', data: 'fecha'},
        {title: 'Duración', data: 'duracion'},
        {title: 'Observacion', data: 'observacion'},
        {title: 'Pago', data: 'pago'},
        {title: 'Boleta', data: 'boleta'},
        {title: 'Monto', data: 'monto'},
        {title: 'Asistencia', data: 'asistencia'},
    ],
    "columnDefs": [
        { "width": "100", "targets": 1 }
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

$(document).ready(function (e) {
    // console.log(table_horas.columns)
});

function cargaDataHoras(){
    showLoader(true);
    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetHorasClinicas',
        type: 'POST',
        data: {
            paciente: $("#srcPaciente").val()
        },
        success: function (respuesta) {
            showLoader(false);
            console.log(respuesta)

            let res = JSON.parse(respuesta);

            table_horas.clear().draw();
            table_horas.rows.add(res).draw();

            // if (respuesta === '1') {
            //     sendToast('success', 'Pago', 'Modificaion realizada correctamente')
            //     modalNewPresupuesto.hide()
            // } else {
            //     sendToast('secondary', 'Error', 'Consulte con el administrador de sistema')
            // }


            // $str_tarea_completa = '<span class="badge text-bg-light border border-secondary n-box">Completa</span>';
            // $str_tarea_incompleta = '<span class="badge text-bg-secondary n-box">Pendiente</span>';

        }
    });
}