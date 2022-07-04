<?php 

namespace Controllers;

use MVC\Router;
use Model\Vehiculo;
use Model\File;
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
        $vehiculo = new Vehiculo();
        $imagen = new File();
        $errores = Vehiculo::getErrores();        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Crea una nueva instancia */
            $vehiculo = new Vehiculo($_POST['vehiculo']);
            
            // Validar
            $errores = $vehiculo->validar();
            if(empty($errores)) {
                // Guarda en la base de datos
                $resultado = $vehiculo->guardar();
                debuguear($vehiculo);
            }

            $imagenes = $_FILES['files']['tmp_name'];
            
            $countfiles = count($imagenes);
            for($i = 0; $i < $countfiles; $i++) {
                
                $imagen = new File($imagenes[$i]);   
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
                // Realiza un resize a la imagen con intervention
                $image = Image::make($imagenes[$i])->fit(800,600);
                // Setear la imagen
                $imagen->setImagen($nombreImagen);
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                
                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                $imagen->vehiculoId = $vehiculo->id;
                $imagen->guardar();
            }
            
                
                if($resultado) {
                    header('location: /admin');
                }
            }
        
        
        $router->render('vehiculos/crear', [
            'errores' => $errores,
            'vehiculo' => $vehiculo,
            'files' => $imagen
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
}