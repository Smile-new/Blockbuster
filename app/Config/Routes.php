<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 * // Get all specifics values or value specific
 * $routes->get('new_route','Controller::method', ['as' => 'identifier']);
 * 
 * // Body Request - Send data
 * $routes->post('','', ['as' => '']);
 * 
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::example');
$routes->get('/inicio', 'Usuario/InicioSesion::index', ['as'=> 'inicio']);
$routes->get('/dashboard', 'Panel/Dashboard::index', ['as'=> 'dashboard']);
//$routes->get('/dashboard2', 'Panel/Dashboard::index', ['as'=> 'dashboard2']);

$routes->post('/iniciar_sesion', 'Usuario/InicioSesion::iniciar_sesion');
$routes->get('/salir', 'Usuario/Logout::index', ['as'=> 'salir']);

$routes->get('/usuarios', 'Panel/Usuarios::index', ['as'=> 'usuarios']);
$routes->get('/usuario_nuevo', 'Panel/Usuario_nuevo::index', ['as'=> 'usuario_nuevo']);
$routes->post('/registrar_usuario', 'Panel/Usuario_nuevo::registrar', ['as'=> 'registrar_usuario']);
$routes->get('/detalles_usuario/(:num)', 'Panel\Usuario_detalles::index/$1', ['as'=> 'detalles_usuario']);
$routes->post('editar_usuario/(:num)', 'Panel\Usuario_detalles::actualizar/$1', ['as'=> 'editar_usuario']);
$routes->get('estatus_usuario/(:segment)/(:segment)', 'Panel\Usuarios::estatus/$1/$2', ['as' => 'estatus_usuario']);
$routes->get('eliminar_usuario/(:num)', 'Panel\Usuarios::eliminar/$1', ['as'=> 'eliminar_usuario']);



// Rutas para el módulo de géneros (sin prefijo 'panel')
$routes->get('generos', 'Panel\Generos::index', ['as' => 'generos']);

// Crear nuevo género
$routes->get('/generos/nuevo', 'Panel\Genero_nuevo::index', ['as' => 'nuevo_genero']);
$routes->post('/generos/guardar', 'Panel\Genero_nuevo::registrar', ['as' => 'guardar_genero']);

// Editar género
$routes->get('generos/editar/(:num)', 'Panel\Genero_detalles::index/$1', ['as' => 'editar_genero']);
$routes->post('generos/actualizar/(:num)', 'Panel\Genero_detalles::actualizar/$1', ['as' => 'actualizar_genero']);
$routes->get('generos/estatus/(:segment)/(:segment)', 'Panel\Generos::estatus/$1/$2', ['as' => 'estatus_genero']);
// Eliminar género
$routes->get('generos/eliminar/(:num)', 'Panel\Generos::eliminar/$1', ['as' => 'eliminar_genero']);


$routes->get('panel/streaming', 'Panel\Streaming::index', ['as' => 'streaming']);
$routes->get('panel/streaming/nuevo', 'Panel\Streaming::nuevo', ['as' => 'nuevo_streaming']);
$routes->post('panel/streaming/guardar', 'Panel\Streaming::guardar', ['as' => 'guardar_streaming']);
$routes->get('panel/streaming/editar/(:num)', 'Panel\Streaming::editar/$1', ['as' => 'editar_streaming']);
$routes->post('panel/streaming/actualizar/(:num)', 'Panel\Streaming::actualizar/$1', ['as' => 'actualizar_streaming']);
$routes->get('panel/streaming/eliminar/(:num)', 'Panel\Streaming::eliminar/$1', ['as' => 'eliminar_streaming']);
$routes->get('panel/streaming/estatus/(:segment)/(:segment)', 'Panel\Streaming::estatus/$1/$2', ['as' => 'estatus_streaming']);


$routes->get('panel/videos', 'Panel\Videos::index', ['as' => 'videos']);
$routes->get('videos/nuevo', 'Panel\Videos::nuevo', ['as' => 'nuevo_video']);
$routes->post('videos/guardar', 'Panel\Videos::guardar', ['as' => 'guardar_video']);
$routes->get('videos/editar/(:num)', 'Panel\Videos::editar/$1', ['as' => 'editar_video']);
$routes->post('videos/actualizar/(:num)', 'Panel\Videos::actualizar/$1', ['as' => 'actualizar_video']);
$routes->get('videos/eliminar/(:num)', 'Panel\Videos::eliminar/$1', ['as' => 'eliminar_video']);
$routes->get('videos/estatus/(:segment)/(:segment)', 'Panel\Videos::estatus/$1/$2', ['as' => 'estatus_video']);


// Listado principal
$routes->get('planes', 'Panel\Planes::index', ['as' => 'planes']);
// Crear nuevo
$routes->get('planes/nuevo', 'Panel\Planes::nuevo', ['as' => 'nuevo_plan']);
$routes->post('planes/guardar', 'Panel\Planes::guardar', ['as' => 'guardar_plan']);
// Editar
$routes->get('planes/editar/(:num)', 'Panel\Planes::editar/$1', ['as' => 'editar_plan']);
$routes->post('planes/actualizar/(:num)', 'Panel\Planes::actualizar/$1', ['as' => 'actualizar_plan']);
// Cambiar estatus (segmento dinámico)
$routes->get('planes/estatus/(:segment)/(:segment)', 'Panel\Planes::estatus/$1/$2', ['as' => 'estatus_plan']);
// Eliminar
$routes->get('planes/eliminar/(:num)', 'Panel\Planes::eliminar/$1', ['as' => 'eliminar_plan']);


// CRUD Usuarios-Planes
$routes->get('usuarios-planes', 'Panel\Usuarios_Planes::index', ['as' => 'usuarios_planes']);
$routes->get('usuarios-planes/nuevo', 'Panel\Usuarios_Planes::nuevo', ['as' => 'nuevo_usuario_plan']);
$routes->post('usuarios-planes/guardar', 'Panel\Usuarios_Planes::guardar', ['as' => 'guardar_usuario_plan']);
$routes->get('usuarios-planes/editar/(:num)', 'Panel\Usuarios_Planes::editar/$1', ['as' => 'editar_usuario_plan']);
$routes->post('usuarios-planes/actualizar/(:num)', 'Panel\Usuarios_Planes::actualizar/$1', ['as' => 'actualizar_usuario_plan']);
$routes->get('usuarios-planes/eliminar/(:num)', 'Panel\Usuarios_Planes::eliminar/$1', ['as' => 'eliminar_usuario_plan']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
