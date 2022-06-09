<?php 

namespace Controllers;

use MVC\Router;
use Model\Vehiculo;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VehiculoController  {
    
    public static function index(Router $router) {
        $vehiculos = Vehiculo::all();
        $vendedores = Vendedor::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('vehiculos/index', [
            'vehiculos' => $vehiculos,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $errores = Vehiculo::getErrores();
        $vehiculo = new Vehiculo;
        $vendedores = Vendedor::all();

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $vehiculo = new Vehiculo($_POST['vehiculo']);

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['vehiculo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vehiculo']['tmp_name']['imagen'])->fit(800,600);
                $vehiculo->setImagen($nombreImagen);
            }

            // Validar
            $errores = $vehiculo->validar();
            if(empty($errores)) {

                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $resultado = $vehiculo->guardar();

                if($resultado) {
                    header('location: /vehiculos');
                }
            }
        }

        $router->render('vehiculos/crear', [
            'errores' => $errores,
            'vehiculo' => $vehiculo,
            'vendedores' => $vendedores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/vehiculos');

        // Obtener los datos de la vehiculo
        $vehiculo = Vehiculo::find($id);

        // Consultar para obtener los vendedores
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Vehiculo::getErrores();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Asignar los atributos
                $args = $_POST['vehiculo'];

                $vehiculo->sincronizar($args);

                // Validación
                $errores = $vehiculo->validar();

                // Subida de archivos
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                if($_FILES['vehiculo']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['vehiculo']['tmp_name']['imagen'])->fit(800,600);
                    $vehiculo->setImagen($nombreImagen);
                }


                
                if(empty($errores)) {
                    // Almacenar la imagen
                    if($_FILES['vehiculo']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    // Guarda en la base de datos
                    $resultado = $vehiculo->guardar();

                    if($resultado) {
                        header('location: /vehiculos');
                    }
                }

        }

        $router->render('vehiculos/actualizar', [
            'vehiculo' => $vehiculo,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];

            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                // Leer el id
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
    
                // encontrar y eliminar la vehiculo
                $vehiculo = Vehiculo::find($id);
                $resultado = $vehiculo->eliminar();

                // Redireccionar
                if($resultado) {
                    header('location: /vehiculos');
                }
            }
        }
    }

}