<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\VehiculoController;
use Controllers\PaginasController;
use Controllers\LoginController;
use Classes\Email;

$router = new Router();

//Privadas
$router->get('/admin', [VehiculoController::class, 'index']);
$router->get('/vehiculos/crear', [VehiculoController::class, 'crear']);
$router->post('/vehiculos/crear', [VehiculoController::class, 'crear']);
$router->get('/vehiculos/actualizar', [VehiculoController::class, 'actualizar']);
$router->post('/vehiculos/actualizar', [VehiculoController::class, 'actualizar']);
$router->post('/vehiculos/eliminar', [VehiculoController::class, 'eliminar']);
$router->post('/vehiculos/eliminarimg', [VehiculoController::class, 'eliminarImg']);

// Publicas
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);
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