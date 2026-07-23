let baseUrl = $('#hdnBaseUrl').val();
// let el_menu_collapse = document.getElementById("ficha-menu-movil-container");
// let menu_collapse = new bootstrap.Collapse(el_menu_collapse);
let width;


const toast = new bootstrap.Toast(document.getElementById('customToast'));

$(document).ready(function (e) {
    obieneDataAnamnesisCorta();
    showLoader(false);
});

$('.ficha-menu').click(function () {
    $('#ficha-menu-movil-container').removeClass('show');
});

function switcharea(option) {
    width = $(window).width();
    if (width < 768) {
        // menu_collapse.toggle()
    }
    let ele = getOptionElement(option)
    $('.ficha-menu-item-modern').removeClass('active');
    $('.ficha-container').removeClass('visible');

    $('#' + ele[1]).addClass('active');
    $('#' + ele[0]).addClass('visible');

}

function getOptionElement(option) {

    let resp = [];

    switch (option) {
        case 1:
            resp[0] = 'ana-corta';
            resp[1] = 'ana-corta-btn';
            obieneDataAnamnesisCorta(false);
            break;
        case 2:
            resp[0] = 'odonto';
            resp[1] = 'odonto-btn';
            resetFormDent()
            break;
        case 3:
            resp[0] = 'ana-detalle';
            resp[1] = 'ana-detalle-btn';
            break;
        case 4:
            resp[0] = 'evolucion';
            resp[1] = 'evolucion-btn';
            cargaDataEvolucion();
            break;
        case 5:
            resp[0] = 'horas';
            resp[1] = 'horas-btn';
            cargaDataHoras();
            break;
        case 6:
            resp[0] = 'presupuestos';
            resp[1] = 'presupuestos-btn';
            cargaDataPresupuesto();
            break;
        case 7:
            resp[0] = 'recetas';
            resp[1] = 'recetas-btn';
            cargaDataRecetas();
            break;
        case 8:
            resp[0] = 'radiografias';
            resp[1] = 'radiografias-btn';
            cargaDataRadiografias();
            break;
        case 9:
            resp[0] = 'consentimiento';
            resp[1] = 'consentimiento-btn';
            cargaDataConsentimiento();
            break;
    }

    return resp;
}
