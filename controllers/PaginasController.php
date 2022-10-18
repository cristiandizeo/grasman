<?php

namespace Controllers;

use Classes\Email;
use Model\Bicicleta;
use MVC\Router;
use Model\Vehiculo;
use Model\File;
use Model\Fileb;
use Model\Imagenes;

class PaginasController
{
  public static function index(Router $router)
  {

    $vehiculos = Vehiculo::where('visible', 1, 3);
    $bicicletas = Bicicleta::where('visible', 1, 3);
    $consulta = $vehiculos[0];
    $consultas = $bicicletas[0];
    $imagenes = File::imgId();
    $imageness = Fileb::imgbId();
    $imgclientes = Imagenes::all();

    $router->render('paginas/index', [
      'inicio' => true,
      'consulta' => $consulta,
      'consultas' => $consultas,
      'imagenes' => $imagenes,
      'imageness' => $imageness,
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
    $page = 'vehiculos';
    //buscador (filtrar)
    $buscador = Vehiculo::buscador();
    $router->render('paginas/vehiculos', [
      'consulta' => $consulta,
      'paginas' => $paginas,
      'pagina' => $pagina,
      'buscador' => $buscador,
      'args' => $args,
      'imagenes' => $imagenes,
      'page' => $page
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
    $page = 'vehiculo';

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
      'resultado' => $resultado,
      'page' => $page
    ]);
  }
  public static function bicicletas(Router $router)
  {
    
    //traer las imagenes de agrupadas por vehiculo
    $imageness = Fileb::imgbId();

    // parametros del buscador
    $args = [];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      // extrae parametros del buscador
      $args = ($_GET);
      // fitra resultados
      $bicicletas = Bicicleta::filtrar($args);
      //filtra resultados para cada pagina
    } else {
      // fitra resultados
      $bicicletas = Bicicleta::filtrar($args);
    }
    $consultas = $bicicletas[0];
    $paginas = $bicicletas[1];
    $pagina = $bicicletas[2];
    $page = 'bicicletas';
    //buscador (filtrar)
    $buscador = Bicicleta::buscador();
    $router->render('paginas/bicicletas', [
      'consultas' => $consultas,
      'paginas' => $paginas,
      'pagina' => $pagina,
      'buscador' => $buscador,
      'args' => $args,
      'imageness' => $imageness,
      'page' => $page
    ]);
  }

  public static function bicicleta(Router $router)
  {
    $id = validarORedireccionar('/bicicletas');

    // Obtener los datos de la vehiculo
    $bicicleta = Bicicleta::find($id);
    if($_GET['id'] != $bicicleta->id || $bicicleta->visible == '0'){
      header('Location: /404');
    }
    $imageness = Fileb::all();
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
    $router->render('paginas/bicicleta', [
      'bicicleta' => $bicicleta,
      'imageness' => $imageness,
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
    $page = 'contacto';

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
      'page' => $page,
      'resultado' => $resultado
    ]);
  }

  public static function vender(Router $router)
  {
    $mail = new Email();
    $errores = Email::getErrores();
    $resultado = false;
    $page = 'quiero-vender';
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
      'resultado' => $resultado,
      'page' => $page,
    ]);
  }

  public static function notfound(Router $router)
  {
    $router->render('paginas/404', []);
  }
}