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

    $vehiculos = Vehiculo::where('visible', 1, 3);
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

    //traer las imagenes de ese vehiculo
    $imagenes = File::imgId();
    
    //buscador (filtrar)
    $buscador = Vehiculo::buscador();
    // parametros del buscador
    $args = [];
    if (isset($_GET["vehiculo"])) {
      // extrae parametros del buscador
      $args = $_GET['vehiculo'];
    } 
    if (isset($_GET["pagina"])) {
      $pagina = $_GET["pagina"];
    } else {
      $pagina = 1;
    }
    // cantidad de vehiculos por pagina
    $prodporpagina = 4;
    // cantidad de registros ignorados, permite dividir paginas
    $offset = ($pagina - 1) * $prodporpagina;
    $vehiculos = Vehiculo::where('visible', 1, $args);
    // calcula cantidad de paginas
    $paginas = ceil(count($vehiculos) / $prodporpagina);
    $vehiculos = Vehiculo::where('visible', 1, $args, $prodporpagina, $offset);
    // debuguear($vehiculos);
    // realizar filtro
    $router->render('paginas/vehiculos', [
      'pagina' => $pagina,
      'paginas' => $paginas,
      'vehiculos' => $vehiculos,
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
