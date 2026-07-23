var myModalReceta = document.getElementById('modalReceta');
var modalReceta = bootstrap.Modal.getOrCreateInstance(myModalReceta, {backdrop: 'static'});

var myModalViewReceta = document.getElementById('modalViewReceta');
var modalViewReceta = bootstrap.Modal.getOrCreateInstance(myModalViewReceta, {backdrop: 'static'});

var delta, quill, quillView, table_recetas;

// const toolbarOptions = [['bold', 'italic', 'underline', 'strike'], ['link', 'image']];

const toolbarOptions = [
    [{'font': []}],
    [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    [{'align': []}],
    // ['blockquote', 'code-block'],
    // ['link', 'image', 'video', 'formula'],
    // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
    [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
    [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
    // [{ 'direction': 'rtl' }],                         // text direction
    [{'color': []}, {'background': []}],          // dropdown with defaults from theme
    ['clean']                                         // remove formatting button
];

$(document).ready(function (e) {
    quill = new Quill("#editorRecetas", {
        theme: "snow",
        modules: {
            toolbar: toolbarOptions
        }
    });

    quillView = new Quill('#editorViewRecetas', {
        theme: "snow",
        modules: {
            toolbar: toolbarOptions
        }
    })


    table_recetas = $('#table_recetas').DataTable({
        select: {
            style: 'single'
        },
        columns: [
            {title: 'Fecha', data: 'fecha'},
            {title: 'Descripcion', data: 'detalle'},
            {title: 'Opciones', data: 'idreceta', visible: false},
        ],
        "autoWidth": false,
        "columnDefs": [
            {"width": "20%", "targets": 0}, // Example for setting specific widths
        ],
        "order": [[0, 'desc']],
        "bLengthChange": false,
        "bInfo": false,
        "paging": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        "initComplete": function (settings, json) {
            showLoader(false);
        },
    });

    table_recetas.on('select', function (e, dt, type, indexes) {
        if (type === 'row') {
            // modalViewReceta.show()
            var data = table_recetas.rows(indexes).data();
            var id_receta = data[0].idreceta;

            cargaReceta(id_receta)
        }


    });
})

function cargaReceta(id_receta) {
    showLoader(true);

    $.ajax({
        url: baseUrl + '/UserPaciente/getReceta',
        type: 'POST',
        data: {
            id_receta: id_receta
        },
        success: function (respuesta) {

            let res = JSON.parse(respuesta)

            var initialContent = {ops: []};

            res['ops'].forEach(el => {

                if ('attributes' in el && el.attributes.alt === 'user-signature') {
                    el.attributes.alt = 'user-signature'
                }

                initialContent.ops.push(el)
            })


            // quillView.setContents(res);
            quillView.setContents(initialContent);
            resizeImages();
            showLoader(false);
            quillView.enable(false);
            modalViewReceta.show();

        }
    });
}

$('#btnModalRecetas').click(function () {
    // Ejecutar la función al inicializar el contenido

    var initialContent = {
        ops: [
            {insert: '\n\n\n\n\n\n\n\n\n\n\n\n\n'},
        ]
    };

    quill.setContents(initialContent);

    modalReceta.show();

})

$('#btnCapture').click(function () {
    delta = quill.getContents();
})


$('#btnInsert').click(function () {
    quill.setContents(delta);
})


function resizeImages() {
    var imgs = document.querySelectorAll('.ql-editor img');
    imgs.forEach(function (img) {
        img.classList.add('resized-image');
    });
}

$('#btnGuardarReceta').click(function () {

    var editorContent = quill.getText().trim();
    var paciente = $('#srcPaciente').val();
    var usuario = $('#srcUser').val();
    var receta = quill.getContents();

    if (editorContent.length === 0) {
        sendToast('error', 'Receta médica', 'Debe escribir la receta')
    } else {

        showLoader(true);

        $.ajax({
            url: baseUrl + '/UserPaciente/fichaSetReceta',
            type: 'POST',
            data: {
                paciente: paciente,
                usuario: usuario,
                receta: receta
            },
            success: function (respuesta) {

                if (respuesta == 'true') {
                    sendToast('success', 'Receta médica', 'Receta generada correctamente')
                } else {
                    sendToast('error', 'Receta médica', 'Error al generar receta')
                }

                modalReceta.hide()

                showLoader(false);

                cargaDataRecetas();

            }
        });
    }
})

function cargaDataRecetas() {
    showLoader(true);
    $.ajax({
        url: baseUrl + '/UserPaciente/fichaGetRecetas',
        type: 'POST',
        data: {
            paciente: $("#srcPaciente").val()
        },
        success: function (respuesta) {
            showLoader(false);

            let res = JSON.parse(respuesta);

            table_recetas.clear().draw();
            table_recetas.rows.add(res).draw();

        }
    });
}

$('#btnPrintReceta').click(function () {

    var element = document.getElementById('editorViewRecetas');
    // OBTENER EL OBJETO DEL EDITOR, YA EXISTE quillView
    // OBTENER LA IMAGEN de lA RECETA

    var qlEditorElement = element.querySelector('.ql-editor');

    if (qlEditorElement) {
        // Obtener el contenido como string
        var contentAsString = qlEditorElement.innerHTML;
    } else {
        console.log('Elemento con clase "ql-editor" no encontrado.');
    }

    // showLoader(true);

    showLoader(true);

    fetch(baseUrl + '/UserPaciente/printReceta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ // En caso de método POST
            // Tus datos aquí
            paciente: $("#srcPaciente").val(),
            receta: contentAsString
        })
    })
        .then(response => {

            showLoader(false);

            if (!response.ok) {
                throw new Error('Error en la respuesta de la solicitud');
            }
            return response.blob(); // Convertir la respuesta a un Blob
        })
        .then(blob => {
            // Crear un enlace temporal para descargar el archivo
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;

            // Opcional: Establecer el nombre del archivo
            a.download = 'Receta.pdf';

            // Simular el clic en el enlace
            document.body.appendChild(a);
            a.click();

            // Limpiar el DOM y liberar el objeto URL
            a.remove();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => {
            console.error('Error al descargar el archivo:', error);
        });

});

$('#btnSendReceta').click(function () {

    showLoader(true);
    var element = document.getElementById('editorViewRecetas');
    // OBTENER EL OBJETO DEL EDITOR, YA EXISTE quillView
    // OBTENER LA IMAGEN de lA RECETA

    var qlEditorElement = element.querySelector('.ql-editor');

    if (qlEditorElement) {
        // Obtener el contenido como string
        var contentAsString = qlEditorElement.innerHTML;
    } else {
        console.log('Elemento con clase "ql-editor" no encontrado.');
    }

    // showLoader(true);

    fetch(baseUrl + '/UserPaciente/sendReceta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ // En caso de método POST
            // Tus datos aquí
            paciente: $("#srcPaciente").val(),
            receta: contentAsString
        })
    })
    .then(response => {
        showLoader(false);
        sendToast('success', 'Receta médica', 'Receta enviada correctamente')
    })
    .catch(error => {
        console.error('Error al descargar el archivo:', error);
    });


});