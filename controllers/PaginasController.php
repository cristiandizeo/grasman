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
    //traer vehiculos visibles
    $vehiculos = Vehiculo::where('visible', 1);
    //traer las imagenes de ese vehiculo
    $imagenes = File::imgId();

    //buscador (filtrar)
    $buscador = Vehiculo::buscador();
    $resultados = [];
    $args = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['vehiculo'];
      //buscar segun filtros aplicados
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
    $mail = new Email();
    $errores = Email::getErrores();
    $resultado = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $mail = new Email($_POST['mail']);
      $resultado = $mail->nuevoMensaje();

      if ($resultado === false) {
        $errores[] = '* Revisá tu email';
      } else {
        $resultado = true;
        $mail = new Email();
      }
      
    }
    $router->render('paginas/vehiculo', [
      'vehiculo' => $vehiculo,
      'imagenes' => $imagenes,
      'errores' => $errores,
      'mail' => $mail,
      'resultado' => $resultado
  ]);
  }

  public static function contacto(Router $router)
  {
    $mail = new Email();
    $errores = Email::getErrores();
    $resultado = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $mail = new Email($_POST['mail']);
      $resultado = $mail->nuevoMensaje();

      if ($resultado === false) {
        $errores[] = '* Revisá tu email';
      } else {
        $resultado = true;
        $mail = new Email();
      }
    }

    $router->render('paginas/contacto', [
      'errores' => $errores,
      'mail' => $mail,
      'resultado' => $resultado
    ]);
  }
  
  public static function vender(Router $router)
  {
    $mail = new Email();
    $errores = Email::getErrores();
    $resultado = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $mail = new Email($_POST['mail']);
      $resultado = $mail->nuevoMensaje();

      if ($resultado === false) {
        $errores[] = '* Revisá tu email';
      } else {
        $resultado = true;
        $mail = new Email();
      }
    }

    $router->render('paginas/quiero-vender', [
      'errores' => $errores,
      'mail' => $mail,
      'resultado' => $resultado
    ]);
  }
  
    public static function notfound(Router $router)
    {
      $router->render('paginas/404', []);
    }
}
