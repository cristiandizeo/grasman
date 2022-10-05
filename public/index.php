<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\VehiculoController;
use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\ImagenesController;
use Classes\Email;

$router = new Router();

//Privadas
$router->get('/admin', [VehiculoController::class, 'index']);
$router->get('/admin/vehiculos/crear', [VehiculoController::class, 'crear']);
$router->post('/admin/vehiculos/crear', [VehiculoController::class, 'crear']);
$router->get('/admin/vehiculos/actualizar', [VehiculoController::class, 'actualizar']);
$router->post('/admin/vehiculos/actualizar', [VehiculoController::class, 'actualizar']);
$router->post('/admin/vehiculos/actualizar/eliminarimg', [VehiculoController::class, 'eliminarImg']);
$router->post('/admin/vehiculos/eliminar', [VehiculoController::class, 'eliminar']);
$router->get('/admin/clientes-felices', [ImagenesController::class, 'clientesfelices']);
$router->post('/admin/clientes-felices', [ImagenesController::class, 'clientesfelices']);
$router->post('/admin/clientes-felices/eliminarimg', [ImagenesController::class, 'eliminarImg']);
$router->get('/admin/agencia', [ImagenesController::class, 'agencia']);
$router->post('/admin/agencia', [ImagenesController::class, 'agencia']);
$router->post('/admin/agencia/eliminarimg', [ImagenesController::class, 'eliminarImg']);

// Publicas
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/vehiculos', [PaginasController::class, 'vehiculos']);
$router->post('/vehiculos', [PaginasController::class, 'vehiculos']);
$router->get('/vehiculo', [PaginasController::class, 'vehiculo']);
$router->post('/vehiculo', [PaginasController::class, 'vehiculo']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);
$router->get('/404', [PaginasController::class, 'notfound']);
$router->get('/quiero-vender', [PaginasController::class, 'vender']);
$router->post('/quiero-vender', [PaginasController::class, 'vender']);

$router->post('/email', [Email::class, 'nuevoMensaje']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();