<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
//$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/* VIEW ROUTES*/
$routes->get('/', 'Login::index');
$routes->get('sendmail', 'Home::sendmail');
$routes->get('mailsent', 'Home::mailsent');
$routes->get('mailnotexist', 'Home::mailnotexist');
$routes->get('resetpass', 'Home::resetpass');
$routes->get('forbidden', 'Home::forbidden');
$routes->add('recover', 'Home::recover');
$routes->add('saveresetpass', 'Home::saveresetpass');

$routes->get('pdf', 'Home::pdf');
$routes->add('home', 'Home::index', ['filter' => 'authGuard']);
$routes->add('admin', 'Admin::index', ['filter' => 'authGuard']);
$routes->add('user', 'User::index', ['filter' => 'authGuard']);
$routes->add('admin/usuarios', 'Admin::usuarios', ['filter' => 'authGuard']);
$routes->add('admin/citas', 'Admin::citas', ['filter' => 'authGuard']);
$routes->add('admin/unidades', 'Admin::unidades', ['filter' => 'authGuard']);
$routes->add('admin/productos', 'Admin::productos', ['filter' => 'authGuard']);
$routes->add('admin/diario', 'Admin::diario', ['filter' => 'authGuard']);
$routes->add('admin/mensual', 'Admin::mensual', ['filter' => 'authGuard']);
$routes->add('admin/presupuesto', 'Admin::presupuesto', ['filter' => 'authGuard']);
$routes->add('admin/novedades', 'Admin::novedades', ['filter' => 'authGuard']);


$routes->add('user/citas', 'User::citas', ['filter' => 'authGuard']);
$routes->add('user/diario', 'User::diario', ['filter' => 'authGuard']);
$routes->add('user/mensual', 'User::mensual', ['filter' => 'authGuard']);
$routes->add('user/presupuesto', 'User::presupuesto', ['filter' => 'authGuard']);
$routes->add('user/perfil', 'User::perfil', ['filter' => 'authGuard']);
$routes->add('user/pacientes', 'User::pacientes', ['filter' => 'authGuard']);
$routes->add('user/ficha', 'User::ficha', ['filter' => 'authGuard']);
$routes->add('user/buscarPacientes', 'User::buscarPacientes', ['filter' => 'authGuard']);

/* LOGIN ROUTES*/
$routes->add('login/startLogIn', 'Login::startLogIn');
$routes->add('login/startLogOut', 'Login::startLogOut', ['filter' => 'authGuard']);

/* CONTROLLER ROUTES*/
/* ADMIN ROUTES*/
$routes->add('AdminUsuarios/getUsers', 'AdminUsuarios::getUsers', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminUsuarios/editUser', 'AdminUsuarios::editUser', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminUsuarios/addUser', 'AdminUsuarios::addUser', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminUsuarios/getDataUsuario', 'AdminUsuarios::getDataUsuario', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminUsuarios/updateDataUsuario', 'AdminUsuarios::updateDataUsuario', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminUsuarios/putSaveFirma', 'AdminUsuarios::putSaveFirma', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminUsuarios/getFirma', 'AdminUsuarios::getFirma', ['filter' => ['authGuard', 'roleGuard:1']]);

$routes->add('AdminCitas/addCita', 'AdminCitas::addCita', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/addTarea', 'AdminCitas::addTarea', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/getUserCitas', 'AdminCitas::getUserCitas', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/getCitaDetalle', 'AdminCitas::getCitaDetalle', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/editCita', 'AdminCitas::editCita', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/editTarea', 'AdminCitas::editTarea', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/removeCita', 'AdminCitas::removeCita', ['filter' => ['authGuard', 'roleGuard:1']]);

$routes->add('AdminDiario/getUserCitas', 'AdminDiario::getUserCitas', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminMensual/getBalance', 'AdminMensual::getBalance', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminMensual/addEgreso', 'AdminMensual::addEgreso', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminMensual/editEgreso', 'AdminMensual::editEgreso', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/obtieneUserPresupuestos', 'AdminPresupuesto::obtieneUserPresupuestos', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/getPacientePresupuestos', 'AdminPresupuesto::getPacientePresupuestos', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemDesarrollo', 'AdminPresupuesto::editItemDesarrollo', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemDescripcion', 'AdminPresupuesto::editItemDescripcion', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemDiente', 'AdminPresupuesto::editItemDiente', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemValor', 'AdminPresupuesto::editItemValor', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemObserv', 'AdminPresupuesto::editItemObserv', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemPago', 'AdminPresupuesto::editItemPago', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemFechaPago', 'AdminPresupuesto::editItemFechaPago', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/addPresupuesto', 'AdminPresupuesto::addPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/getDataPresupuesto', 'AdminPresupuesto::getDataPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/getDataItemPresupuesto', 'AdminPresupuesto::getDataItemPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/editItemPresupuesto', 'AdminPresupuesto::editItemPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/getDataItemsPresupuesto', 'AdminPresupuesto::getDataItemsPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/updatePresupuesto', 'AdminPresupuesto::updatePresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/eliminarItemPresupuesto', 'AdminPresupuesto::eliminarItemPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/addItemToPresupuesto', 'AdminPresupuesto::addItemToPresupuesto', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/getPrestaciones', 'AdminPresupuesto::getPrestaciones', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/getUserPrestacionesExcel', 'AdminPresupuesto::getUserPrestacionesExcel', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminPresupuesto/uploadPrestaciones', 'AdminPresupuesto::uploadPrestaciones', ['filter' => ['authGuard', 'roleGuard:1']]);


$routes->add('AdminNovedades/getAdminNovedades', 'AdminNovedades::getAdminNovedades', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminNovedades/putAdminNovedad', 'AdminNovedades::putAdminNovedad', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminNovedades/putEditAdminNovedad', 'AdminNovedades::putEditAdminNovedad', ['filter' => ['authGuard', 'roleGuard:1']]);


/* USER ROUTES*/
$routes->add('UserCitas/addCita', 'UserCitas::addCita', ['filter' => 'authGuard']);
$routes->add('UserCitas/getUserCitas', 'UserCitas::getUserCitas', ['filter' => 'authGuard']);
$routes->add('UserCitas/getTareas', 'UserCitas::getTareas', ['filter' => 'authGuard']);
$routes->add('AdminCitas/updateFechaCita', 'AdminCitas::updateFechaCita', ['filter' => ['authGuard', 'roleGuard:1']]);
$routes->add('AdminCitas/enviarWhatsapp', 'AdminCitas::enviarWhatsapp', ['filter' => ['authGuard', 'roleGuard:1']]);

$routes->add('UserDiario/getUserCitas', 'UserDiario::getUserCitas', ['filter' => 'authGuard']);

$routes->add('UserMensual/getBalance', 'UserMensual::getBalance', ['filter' => 'authGuard']);
$routes->add('UserMensual/addEgreso', 'UserMensual::addEgreso', ['filter' => 'authGuard']);
$routes->add('UserMensual/editEgreso', 'UserMensual::editEgreso', ['filter' => 'authGuard']);
$routes->add('UserMensual/editTareaEstado', 'UserMensual::editTareaEstado', ['filter' => 'authGuard']);
$routes->add('UserMensual/eliminarTarea', 'UserMensual::eliminarTarea', ['filter' => 'authGuard']);
$routes->add('UserMensual/editTareaDetalle', 'UserMensual::editTareaDetalle', ['filter' => 'authGuard']);
$routes->add('UserMensual/editTareaFecha', 'UserMensual::editTareaFecha', ['filter' => 'authGuard']);
$routes->add('UserMensual/addOtroIngreso', 'UserMensual::addOtroIngreso', ['filter' => 'authGuard']);

$routes->add('UserPaciente/obtieneUserPacientes', 'UserPaciente::obtieneUserPacientes', ['filter' => 'authGuard']);
$routes->add('UserPaciente/addPaciente', 'UserPaciente::addPaciente', ['filter' => 'authGuard']);
$routes->add('UserPaciente/addPacienteDinamic', 'UserPaciente::addPacienteDinamic', ['filter' => 'authGuard']);
$routes->add('UserPaciente/getRecetaPreData', 'UserPaciente::getRecetaPreData', ['filter' => 'authGuard']);
$routes->add('UserPaciente/getReceta', 'UserPaciente::getReceta', ['filter' => 'authGuard']);
$routes->add('UserPaciente/sendReceta', 'UserPaciente::sendReceta', ['filter' => 'authGuard']);
$routes->add('UserPaciente/printReceta', 'UserPaciente::printReceta', ['filter' => 'authGuard']);

$routes->add('UserPaciente/editPaciente', 'UserPaciente::editPaciente', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaSetAnamnesisCorta', 'UserPaciente::fichaSetAnamnesisCorta', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetAnamnesisCorta', 'UserPaciente::fichaGetAnamnesisCorta', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetEvolucion', 'UserPaciente::fichaGetEvolucion', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaSetEvolucion', 'UserPaciente::fichaSetEvolucion', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaSetAnamnesisDetalle', 'UserPaciente::fichaSetAnamnesisDetalle', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetAnamnesisDetalle', 'UserPaciente::fichaGetAnamnesisDetalle', ['filter' => 'authGuard']);


$routes->add('UserPaciente/fichaGetHorasClinicas', 'UserPaciente::fichaGetHorasClinicas', ['filter' => 'authGuard']);

$routes->add('UserPaciente/fichaSetReceta', 'UserPaciente::fichaSetReceta', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetRecetas', 'UserPaciente::fichaGetRecetas', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaSetRadiografia', 'UserPaciente::fichaSetRadiografia', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetRadiografias', 'UserPaciente::fichaGetRadiografias', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetRadiografia', 'UserPaciente::fichaGetRadiografia', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaDelRadiografia', 'UserPaciente::fichaDelRadiografia', ['filter' => 'authGuard']);
$routes->add('UserPaciente/getConsentPreData', 'UserPaciente::getConsentPreData', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaSetConsentimiento', 'UserPaciente::fichaSetConsentimiento', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetConsentimiento', 'UserPaciente::fichaGetConsentimiento', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaGetConsentimientoPdf', 'UserPaciente::fichaGetConsentimientoPdf', ['filter' => 'authGuard']);
$routes->add('UserPaciente/fichaDelConsentimiento', 'UserPaciente::fichaDelConsentimiento', ['filter' => 'authGuard']);
$routes->add('UserPaciente/contactoWp', 'UserPaciente::contactoWp');

$routes->add('UserPaciente/ingresaNuevoOdonto', 'UserPaciente::ingresaNuevoOdonto', ['filter' => 'authGuard']);
$routes->add('UserPaciente/ingresaOdontoItems', 'UserPaciente::ingresaOdontoItems', ['filter' => 'authGuard']);
$routes->add('UserPaciente/obtieneOdontoItems', 'UserPaciente::obtieneOdontoItems', ['filter' => 'authGuard']);
$routes->add('UserPaciente/obtieneOdontosPaciente', 'UserPaciente::obtieneOdontosPaciente', ['filter' => 'authGuard']);

/* FUNCTION ROUTES*/
$routes->add('PdfFactory/generaPdfPresupuesto', 'PdfFactory::generaPdfPresupuesto', ['filter' => 'authGuard']);
$routes->add('PdfFactory/sendPresupuesto', 'PdfFactory::sendPresupuesto', ['filter' => 'authGuard']);

/* DENTALPLAN PUBLIC FUNCTIONS */
$routes->add('PdfFactory/sendContacto', 'PdfFactory::sendContacto');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
