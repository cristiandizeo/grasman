<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Vehiculo;
use Model\File;
use Model\Imagenes;

class PaginasController
{
  public static function index(Router $router)
  {

    $vehiculos = Vehiculo::where('visible', 1, 3);
    $consulta = $vehiculos[0];
    $imagenes = File::imgId();
    $imgclientes = Imagenes::all();

    $router->render('paginas/index', [
      'inicio' => true,
      'consulta' => $consulta,
      'imagenes' => $imagenes,
      'imgclientes' => $imgclientes
    ]);
  }

  public static function nosotros(Router $router)
  {
    $imgclientes = Imagenes::whereImg('seccion', 2);
    $router->render('paginas/nosotros', [
      'imgclientes' => $imgclientes
    ]);
  }


  public static function vehiculos(Router $router)
  {
    
    //traer las imagenes de agrupadas por vehiculo
    $imagenes = File::imgId();

    // parametros del buscador
    $args = [];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      // extrae parametros del buscador
      $args = ($_GET);
      // fitra resultados
      $vehiculos = Vehiculo::filtrar($args);
      //filtra resultados para cada pagina
    } else {
      // fitra resultados
      $vehiculos = Vehiculo::filtrar($args);
    }
    $consulta = $vehiculos[0];
    $paginas = $vehiculos[1];
    $pagina = $vehiculos[2];
    //buscador (filtrar)
    $buscador = Vehiculo::buscador();
    $router->render('paginas/vehiculos', [
      'consulta' => $consulta,
      'paginas' => $paginas,
      'pagina' => $pagina,
      'buscador' => $buscador,
      'args' => $args,
      'imagenes' => $imagenes
    ]);
  }

  public static function vehiculo(Router $router)
  {
    $id = validarORedireccionar('/vehiculos');

    // Obtener los datos de la vehiculo
    $vehiculo = Vehiculo::find($id);
    if($_GET['id'] != $vehiculo->id || $vehiculo->visible == '0'){
      header('Location: /404');
    }
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