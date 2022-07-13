<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Vehiculo;
use Model\File;

class PaginasController
{
  public static function index(Router $router)
  {

    $vehiculos = Vehiculo::where('visible', 1);
    $imagenes = File::imgId();

    $router->render('paginas/index', [
      'inicio' => true,
      'vehiculos' => $vehiculos,
      'imagenes' => $imagenes
    ]);
  }

  public static function nosotros(Router $router)
  {
    $router->render('paginas/nosotros', []);
  }


  public static function vehiculos(Router $router)
  {

    $vehiculos = Vehiculo::where('visible', 1);
    $imagenes = File::imgId();

    $buscador = Vehiculo::buscador();
    $resultados = [];
    $args = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['vehiculo'];
      $resultados = Vehiculo::filtrar($args);
    }

    $router->render('paginas/vehiculos', [
      'vehiculos' => $vehiculos,
      'buscador' => $buscador,
      'resultados' => $resultados,
      'args' => $args,
      'imagenes' => $imagenes
    ]);
  }

  public static function vehiculo(Router $router)
  {
    $id = validarORedireccionar('/vehiculos');

    // Obtener los datos de la vehiculo
    $vehiculo = Vehiculo::find($id);
    $imagenes = File::all();

    $router->render('paginas/vehiculo', [
      'vehiculo' => $vehiculo,
      'imagenes' => $imagenes
    ]);
  }

  public static function contacto(Router $router)
  {
    $errores = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      $telefono = $_POST['telefono'];
      $mensaje = $_POST['mensaje'];

      $mail = new Email($nombre, $email, $telefono, $mensaje);
      $resultado = $mail->nuevoMensaje();

      if (!is_null($resultado)) {
        $errores[] = '* Revisá el formulario';
      } else {
        $nombre = '';
        $email = '';
        $telefono = '';
        $mensaje = '';
      }

    }

    
    $router->render('paginas/contacto', [
      'errores' => $errores,
      'mail' => $mail
    ]);
  }

  public static function notfound(Router $router)
  {
    $router->render('paginas/404', []);
  }

  public static function vender(Router $router)
  {
    $router->render('paginas/quiero-vender', []);
  }
}