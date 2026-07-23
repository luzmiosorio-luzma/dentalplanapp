let myModalOdonto = document.getElementById('modalOdontograma');
let modalOdonto = bootstrap.Modal.getOrCreateInstance(myModalOdonto);

let myModalNewOdonto = document.getElementById('modalNewOdontograma');
let modalNewOdonto = bootstrap.Modal.getOrCreateInstance(myModalNewOdonto);
let correlativoPieza = 0;


const TIPO_PERMA = 1;
const TIPO_DECIDUOS = 2;
let selected_code = '', selected_odontograma;
let tipo_dental = TIPO_PERMA;
let item_tipo_id_cara = '';
let item_tipo_id_raiz = '';
let Item_CaraSector;
let table_items_odonto;
let odonto_model;
let dataSetOdontograma = [];
let odontoColorScheme = new Map();
let top_word = $('#top-word');
let left_word = $('#left-word');
let right_word = $('#right-word');
let bottom_word = $('#bottom-word');

odontoColorScheme.set('cara_1', {hex: '#ffffff'});
odontoColorScheme.set('cara_2', {hex: '#b55229'});
odontoColorScheme.set('cara_3', {hex: '#20528d'});
odontoColorScheme.set('cara_4', {hex: '#5b6598'});
odontoColorScheme.set('cara_5', {hex: '#464c5c'});
odontoColorScheme.set('cara_6', {hex: '#404958'});
odontoColorScheme.set('cara_7', {hex: '#aabcc8'});
odontoColorScheme.set('cara_8', {hex: '#6a6c6b'});
odontoColorScheme.set('cara_9', {hex: '#191d26'});

$(document).ready(function (e) {

    table_items_odonto = $('#table_items_odonto').DataTable({
        data: dataSetOdontograma,
        columns: [
            {title: 'ID Pieza', data: 'id_pieza', visible: false},
            {title: 'Pieza', data: 'pieza'},
            {title: 'Cara', data: 'cara'},
            {title: 'CaraId', data: 'cara_id', visible: false},
            {title: 'Raiz', data: 'raiz'},
            {title: 'RaizId', data: 'raiz_id', visible: false},
            {title: 'area1', data: 'area1', visible: false},
            {title: 'area2', data: 'area2', visible: false},
            {title: 'area3', data: 'area3', visible: false},
            {title: 'area4', data: 'area4', visible: false},
            {title: 'area5', data: 'area5', visible: false},
            {
                title: 'Eliminar',
                "render": function (data, type, row, meta) {
                    // console.log(data, type, row, meta)
                    let index = row.id_pieza;
                    // btn = "<button type='button' class='btn_delete_odonto btn btn-secondary btn-sm' onclick='deleteRow(" + index + ")'><i class='fa-regular fa-trash-can'></i></button>";
                    btn = '<button type="button" class="btn_delete_odonto btn btn-secondary btn-sm" onclick="deleteRow(' + "'" + index + "'" + ')"><i class="fa-regular fa-trash-can"></i></button>';

                    return btn;
                },
                data: 'pieza'
            }

        ],
        "bLengthChange": false,
        "bInfo": false,
        "bFilter": false,
        "bPaginate": false,
        "language": {
            "emptyTable": "No hay Items de Odontograma",
            "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        select: {
            style: 'single'
        },
    });

    $('#myTable tbody').on('click', 'button', function (e) {
        console.log('')
        e.stopPropagation();
    });


})

function fnPreRowSelect(e, nodes) {
    if ($(e.currentTarget).hasClass('editable')) {
        return false;
    }
    return true;
}

const CaraSector = class {
    constructor(area1, area2, area3, area4, area5) {
        this.area1 = false;
        this.area2 = false;
        this.area3 = false;
        this.area4 = false;
        this.area5 = false;
    }
};

const OdontoItem = class {
    constructor(item_code, cara, raiz, area1, area2, area3, area4, area5) {
        this.item_code = '';
        this.cara = '';
        this.raiz = '';
        this.area1 = false;
        this.area2 = false;
        this.area3 = false;
        this.area4 = false;
        this.area5 = false;
    }
};

function init() {
    $('.sd-odontograma-dente svg').attr('pre_selected', 'false')
    selected_odontograma = '';
    //SETTING ID CONTAINER CODES
    var elements = $('.sd-odontograma-dente');
    elements.each(function (index) {
        code = $(this).children().eq(1).attr('data-testid').substring(4, 6);
        $(this).attr('id', 'container_' + code)
    });

}

function deleteRow(indice) {
    this.event.stopPropagation();

    var filteredDataSet = dataSetOdontograma.filter(function (item) {
        return item.id_pieza !== indice;
    });

    dataSetOdontograma = filteredDataSet;

    // dataSetOdontograma.pop(indice)
    table_items_odonto.clear().draw();
    table_items_odonto.rows.add(dataSetOdontograma).draw();
    drawOdontoByScheme();
    sendToast('success', 'Éxito', 'Item de odontograma eliminado correctamente')
}

$('#btn_guardar_item_odonto').click(function (e) {

    let numero_items = dataSetOdontograma.length;

    if (numero_items > 0) {
        let paciente = $('#srcPaciente').val();
        let observacion = $('#inputOdontoObservacion').val();
        showLoader(true)
        $.ajax({
            url: baseUrl + '/UserPaciente/ingresaOdontoItems',
            type: 'POST',
            data: {
                odonto: selected_odontograma,
                paciente: paciente,
                observacion: observacion,
                items: dataSetOdontograma
            },
            success: function (respuesta) {
                showLoader(false);
                data_resp = JSON.parse(respuesta);
                if (data_resp.sucess == true) {
                    sendToast('success', 'Éxito', 'Odontograma guardado correctamente')

                } else {
                    sendToast('error', 'Error', 'Error al guardar el Odontograma')
                }
            }
        });
    } else {
        sendToast('error', 'Error', 'Debe Agregar un item de odontograma')
    }

})

function getOdontoItems(selected_odontograma) {
    showLoader(true)

    $.ajax({
        url: baseUrl + '/UserPaciente/obtieneOdontoItems',
        type: 'POST',
        data: {
            odonto: selected_odontograma
        },
        success: function (respuesta) {
            showLoader(false);
            let data_resp = JSON.parse(respuesta);
            let items = data_resp.items;
            if (data_resp.success == true) {

                $('#inputOdontoObservacion').val(data_resp.obs);

                dataSetOdontograma = items;

                table_items_odonto.clear().draw();
                table_items_odonto.rows.add(dataSetOdontograma).draw();
                drawOdontoByScheme()
                sendToast('success', 'Éxito', 'Odontograma cargado correctamente')
            } else {
                sendToast('error', 'Error', 'Error al guardar el Odontograma')
            }
        }
    });
}

function selOdonto(num, nombre = '') {
    if (num.toString() == '0') {
        modalNewOdonto.show()
    } else {
        $('#btn_select_odonto').text(nombre);
        selected_odontograma = num.toString()
        getOdontoItems(selected_odontograma);
    }
}

function obtieneOdontos() {
    showLoader(true);
    let paciente = $('#srcPaciente').val();

    $.ajax({
        url: baseUrl + '/UserPaciente/obtieneOdontosPaciente',
        type: 'POST',
        data: {
            paciente: paciente
        },
        success: function (respuesta) {
            showLoader(false);
            let odontos = JSON.parse(respuesta);

            $('#menu_odontos').empty();

            odontos.forEach(function (odonto) {
                let el = '<li onclick="selOdonto(' + odonto.idodontograma + ', ' + "'" + odonto.nombre + "'" + ')"> <a class="dropdown-item item_odonto" href="#" val="' + odonto.idodontograma + '">' + odonto.nombre + '</a> </li>';
                $('#menu_odontos').append(el);
            })

            let empty_el = '<li onclick="selOdonto(0)"><a class="dropdown-item item_odonto" href="#" val="0">Nuevo Odontograma <i class="fa fa-add"></i></a></li>';
            $('#menu_odontos').append(empty_el);

        }
    });
}

$('#btn_agregar_new_odonto').click(function (e) {
    let nombre_odonto = $('#inputNombreOdonto').val();

    if (nombre_odonto != '') {

        let paciente = $('#srcPaciente').val();

        $.ajax({
            url: baseUrl + '/UserPaciente/ingresaNuevoOdonto',
            type: 'POST',
            data: {
                nombre: nombre_odonto,
                paciente: paciente
            },
            success: function (respuesta) {
                showLoader(false);
                data_resp = JSON.parse(respuesta);
                modalNewOdonto.hide();
                if (data_resp.status == 'success') {
                    selected_odontograma = data_resp.value;
                    clearOdontoGraph()
                    dataSetOdontograma = [];
                    table_items_odonto.clear().draw();
                    $('#btn_select_odonto').text(nombre_odonto);
                    obtieneOdontos()
                    sendToast('success', 'Éxito', 'Odontograma agregado correctamente')
                } else {
                    sendToast('error', 'Error', 'Error al agregar el Odontograma')
                }
            }
        });
    } else {
        $('#formNewOdonto').addClass('was-validated');
        sendToast('error', 'Error', 'Debe ingresar un nombre de Odontograma');
    }
});

function switchAreaTipoDent(option) {
    let ele = getOptionElementTipoDent(option)
    $('.odonto-item').removeClass('active');
    $('.dento-diagram_complete').addClass('dis_none');
    // resetFormDent()

    $('#' + ele[1]).addClass('active');
    $('#' + ele[0]).removeClass('dis_none');
    drawOdontoByScheme()

}

$('#btn_agregar_odonto_trat').click(function (e) {
    let txt_cara = $('#btn_item_cara').text();
    let txt_raiz = $('#btn_item_raiz').text();

    txt_cara == 'Seleccione' ? txt_cara = 'Ninguno' : txt_cara;
    txt_raiz == 'Seleccione' ? txt_raiz = 'Ninguno' : txt_raiz;

    correlativoPieza++;



    let item_pieza = {
        'id_pieza': 'new' + correlativoPieza,
        'pieza': selected_code,
        'cara': txt_cara,
        'cara_id': item_tipo_id_cara,
        'raiz': txt_raiz,
        'raiz_id': item_tipo_id_raiz,
        'area1': Item_CaraSector.area1,
        'area2': Item_CaraSector.area2,
        'area3': Item_CaraSector.area3,
        'area4': Item_CaraSector.area4,
        'area5': Item_CaraSector.area5
    }

    console.log('raiz', item_tipo_id_raiz)
    dataSetOdontograma.push(item_pieza);
    table_items_odonto.clear().draw();
    table_items_odonto.rows.add(dataSetOdontograma).draw();

    drawOdontoByScheme()
    sendToast('success', 'Odontograma', 'Item Agregado')
    modalOdonto.hide()
})

function clearIconItemOdonto(container) {
    let icon = container.children()[2];
    let icon_zones = icon.children;

    icon_zones[0].setAttribute("class", "")
    icon_zones[1].setAttribute("class", "")
    icon_zones[2].setAttribute("class", "")
    icon_zones[3].setAttribute("class", "")
    icon_zones[4].setAttribute("class", "")

    icon_zones[0].style.fill = '';
    icon_zones[1].style.fill = '';
    icon_zones[2].style.fill = '';
    icon_zones[3].style.fill = '';
    icon_zones[4].style.fill = '';

    // icon_zones[0].classList.remove('item_cara_space_selected')
    // icon_zones[1].classList.remove('item_cara_space_selected')
    // icon_zones[2].classList.remove('item_cara_space_selected')
    // icon_zones[3].classList.remove('item_cara_space_selected')
    // icon_zones[4].classList.remove('item_cara_space_selected')
}

function clearOdontoGraph() {
    for (let i = 1; i < 5; i++) {
        for (let j = 1; j < 9; j++) {
            let container = $('#container_' + i + j);
            clearIconItemOdonto(container)
        }
    }

    for (let i = 5; i < 9; i++) {
        for (let j = 1; j < 6; j++) {
            let container = $('#container_' + i + j);
            clearIconItemOdonto(container)
        }
    }
}

function drawOdontoByScheme() {
    clearOdontoGraph()
    dataSetOdontograma.forEach(function (item, index, array) {

        console.log(item)

        // console.log(item.cara_id, item, index, array)
        // let id_cara = item.cara_id;
        let id_cara =  item.cara_id === '0' ? 1 : item.cara_id;

        let color_index = 'cara_' + id_cara;

        console.log('color_index', color_index);

        let test = odontoColorScheme.get(color_index).hex;
        // console.log(test)

        let container = $('#container_' + item.pieza);
        // clearIconItemOdonto(container)
        let icon = container.children()[2]
        // console.log(container,icon)
        let icon_zones = icon.children
        // console.log(icon, icon_zones[0])

        if (item.area1 === true) {
            // icon_zones[0].classList.add('item_cara_space_selected')
            icon_zones[0].style.fill = test;
        }

        if (item.area2 === true) {
            // icon_zones[1].classList.add('item_cara_space_selected')
            icon_zones[1].style.fill = test;
        }

        if (item.area3 === true) {
            // icon_zones[2].classList.add('item_cara_space_selected')
            icon_zones[2].style.fill = test;
        }

        if (item.area4 === true) {
            // icon_zones[3].classList.add('item_cara_space_selected')
            icon_zones[3].style.fill = test;
        }

        if (item.area5 === true) {
            // icon_zones[4].classList.add('item_cara_space_selected')
            icon_zones[4].style.fill = test;
        }

    })
}


function resetFormDent() {
    init();
    clearOdontoGraph()
    $('#inputOdontoObservacion').val('');
    dataSetOdontograma = [];
    table_items_odonto.clear().draw();
    table_items_odonto.rows.add(dataSetOdontograma).draw();
    $('.sd-odontograma-dente svg:nth-child(2)').children().removeClass('dento_active');
    selected_code = '';
    odonto_model = new OdontoItem();
}

function getOptionElementTipoDent(option) {
    let resp = [];

    switch (option) {
        case 1:
            resp[0] = 'dento_perma';
            resp[1] = 'btn_dento_perma';
            tipo_dental = TIPO_PERMA;
            break;
        case 2:
            resp[0] = 'dento_deciduos';
            resp[1] = 'btn_dento_deciduos';
            tipo_dental = TIPO_DECIDUOS;
            break;
    }

    return resp;
}

function removeDropDownCustomClassCara() {

    let btn_cara = $('#btn_item_cara');

    btn_cara.removeClass('bg_1')
    btn_cara.removeClass('bg_2')
    btn_cara.removeClass('bg_3')
    btn_cara.removeClass('bg_4')
    btn_cara.removeClass('bg_5')
    btn_cara.removeClass('bg_6')
    btn_cara.removeClass('bg_7')
    btn_cara.removeClass('bg_8')
    btn_cara.removeClass('bg_9')
}

function removeDropDownCustomClassRaiz() {

    let btn_raiz = $('#btn_item_raiz');

    btn_raiz.removeClass('bgr_1')
    btn_raiz.removeClass('bgr_2')
    btn_raiz.removeClass('bgr_3')
    btn_raiz.removeClass('bgr_4')
    btn_raiz.removeClass('bgr_5')
    btn_raiz.removeClass('bgr_6')
    btn_raiz.removeClass('bgr_7')
    btn_raiz.removeClass('bgr_8')
    btn_raiz.removeClass('bgr_9')
}

$('.cara_item').click(function (e) {
    let item_text = this.innerText
    let bg_opt = $(this).attr('bg_opt')
    $('#btn_item_cara').text(item_text)
    removeDropDownCustomClassCara()
    $('#btn_item_cara').addClass(bg_opt)
    item_tipo_id_cara = $(this).attr('val')
    $('#btn_item_cara').attr('val', item_tipo_id_cara)
})

$('.raiz_item').click(function (e) {
    let item_text = this.innerText
    item_tipo_id_raiz = $(this).attr('val')

    $('#btn_item_raiz').text(item_text)
    removeDropDownCustomClassRaiz()
    $('#btn_item_raiz').addClass('bgr_' + item_tipo_id_raiz)

    $('#btn_item_raiz').attr('val', item_tipo_id_raiz)
})

function resetModalOdonto() {
    $('.cara_item_space').removeClass('item_cara_space_selected')
    Item_CaraSector = new CaraSector();
    item_tipo_id_cara = '0';
    item_tipo_id_raiz = '0';
    removeDropDownCustomClassCara();
    removeDropDownCustomClassRaiz();
    $('#btn_item_cara').text('Sano')
    $('#btn_item_raiz').text('Sano')
}

$('.sd-odontograma-dente svg:nth-child(2)').click(function (e) {
    if (selected_odontograma != '') {
        let cod_dento = $(this).attr('data-testid').substring(4, 6)
        selected_code = cod_dento
        resetModalOdonto()
        setOrientationWords(cod_dento)
        modalOdonto.show()
    } else {
        sendToast('secondary', 'Odontograma', 'Seleccione o registre un odontograma')
    }
})

function setOrientationWords(odonto_item){
    if (odonto_item >= '11' && odonto_item <= '18' || odonto_item >= '51' && odonto_item <= '55'){
        top_word.text('P')
        left_word.text('D')
        right_word.text('M')
        bottom_word.text('V')
    }else if(odonto_item >= '21' && odonto_item <= '28' || odonto_item >= '61' && odonto_item <= '65'){
        top_word.text('P')
        left_word.text('M')
        right_word.text('D')
        bottom_word.text('V')
    }else if(odonto_item >= '31' && odonto_item <= '38' || odonto_item >= '71' && odonto_item <= '75'){
        top_word.text('V')
        left_word.text('M')
        right_word.text('D')
        bottom_word.text('P')
    }else if(odonto_item >= '41' && odonto_item <= '48' || odonto_item >= '81' && odonto_item <= '85'){
        top_word.text('V')
        left_word.text('D')
        right_word.text('M')
        bottom_word.text('P')
    }
}

$('.cara_item_space').click(function (e) {
    let area = $(this).attr('data-area')

    switch (area) {
        case 'area1':
            if (Item_CaraSector.area1 === true) {
                Item_CaraSector.area1 = false
                $(this).removeClass('item_cara_space_selected');
            } else {
                Item_CaraSector.area1 = true
                $(this).addClass('item_cara_space_selected');
            }
            break;
        case 'area2':
            if (Item_CaraSector.area2 === true) {
                Item_CaraSector.area2 = false
                $(this).removeClass('item_cara_space_selected');
            } else {
                Item_CaraSector.area2 = true
                $(this).addClass('item_cara_space_selected');
            }
            break;
        case 'area3':
            if (Item_CaraSector.area3 === true) {
                Item_CaraSector.area3 = false
                $(this).removeClass('item_cara_space_selected');
            } else {
                Item_CaraSector.area3 = true
                $(this).addClass('item_cara_space_selected');
            }
            break;
        case 'area4':
            if (Item_CaraSector.area4 === true) {
                Item_CaraSector.area4 = false
                $(this).removeClass('item_cara_space_selected');
            } else {
                Item_CaraSector.area4 = true
                $(this).addClass('item_cara_space_selected');
            }
            break;
        case 'area5':
            if (Item_CaraSector.area5 === true) {
                Item_CaraSector.area5 = false
                $(this).removeClass('item_cara_space_selected');
            } else {
                Item_CaraSector.area5 = true
                $(this).addClass('item_cara_space_selected');
            }
            break;
    }

})