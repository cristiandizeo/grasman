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
    
    //buscador (filtrar)
    $buscador = Vehiculo::buscador();
    $args = [];
    
    $prodporpagina = 4;
    $pagina = 1;
    $offset = ($pagina - 1) * $prodporpagina;
    //traer vehiculos visibles
    $vehiculos = Vehiculo::filtrar($args, $prodporpagina, $offset);
    //traer las imagenes de ese vehiculo
    $imagenes = File::imgId();
    $paginas = ceil(count($vehiculos) / $prodporpagina);
    // debuguear($vehiculos);
    if (isset($_GET["pagina"])) {
      $pagina = $_GET["pagina"];
    }
    if (isset($_GET["vehiculo"])) {
      $args = $_GET['vehiculo'];
      //buscar segun filtros aplicados
      $vehiculos = Vehiculo::filtrar($args, $prodporpagina, $offset);
    }

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
