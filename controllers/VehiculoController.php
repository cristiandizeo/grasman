<?php 

namespace Controllers;

use MVC\Router;
use Model\Vehiculo;
use Intervention\Image\ImageManagerStatic as Image;

class VehiculoController  {
    
    public static function index(Router $router) {
        $vehiculos = Vehiculo::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('vehiculos/index', [
            'vehiculos' => $vehiculos,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $errores = Vehiculo::getErrores();
        $vehiculo = new Vehiculo;

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
            'vehiculo' => $vehiculo
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/vehiculos');

        // Obtener los datos del vehiculo
        $vehiculo = Vehiculo::find($id);

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
                        header('location: /admin');
                    }
                }

        }

        $router->render('vehiculos/actualizar', [
            'vehiculo' => $vehiculo,
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
                    header('location: /admin');
                }
            }
        }
    }
    public static function buscar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];

            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                // Leer el id
                
            $estado = $_POST['estado'];
            $tipo = $_POST['tipo'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $km = $_POST['km'];
            $caja = $_POST['caja'];
            $combustible = $_POST['combustible'];
    
                // encontrar y eliminar la vehiculo
                $vehiculos = Vehiculo::buscar($estado, $tipo, $marca, $modelo, $precio, $km, $caja, $combustible);


        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        
                $router->render('vehiculos', [
                    'vehiculos' => $vehiculos,
                    'resultado' => $resultado
                ]);
            }

}
}
}