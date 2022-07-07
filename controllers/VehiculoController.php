<?php

namespace Controllers;

use MVC\Router;
use Model\Vehiculo;
use Model\File;
use Intervention\Image\ImageManagerStatic as Image;

class VehiculoController
{
    public static function index(Router $router)
    {
        
        isAuth();
        $vehiculos = Vehiculo::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('vehiculos/index', [
            'vehiculos' => $vehiculos,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router)
    {
        
        isAuth();
        $vehiculo = new Vehiculo();
        $imagen = new File();
        $errores = Vehiculo::getErrores(); 
        $imagenes = [];
        // Ejecutar el código después de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Crea una nueva instancia */
            $vehiculo = new Vehiculo($_POST['vehiculo']);

            // Validar
            $errores = $vehiculo->validar();
            if (empty($errores)) {
                // Guarda en la base de datos
                $resultado = $vehiculo->guardar();
                $lastId = $vehiculo->LastId();
            }

            $imagenes = $_FILES['imagenes']['tmp_name'];

            $countfiles = count($imagenes);
            for ($i = 0; $i < $countfiles; $i++) {

                $imagen = new File($imagenes[$i]);
                // Generar un nombre único
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                // Realiza un resize a la imagen con intervention
                $image = Image::make($imagenes[$i])->fit(800, 600);
                // Setear la imagen
                $imagen->setImagen($nombreImagen);
                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                $imagen->vehiculoId = $lastId;
                $imagen->guardar();
            }


            if ($resultado) {
                header('location: /admin');
            }
        }

        $router->render('vehiculos/crear', [
            'errores' => $errores,
            'vehiculo' => $vehiculo,
            'imagenes' => $imagenes
        ]);
    }

    public static function actualizar(Router $router)
    {
        
        isAuth();

        $id = validarORedireccionar('/vehiculos');

        // Obtener los datos del vehiculo
        $vehiculo = Vehiculo::find($id);
        $imagenes = File::all();

        // Arreglo con mensajes de errores
        $errores = Vehiculo::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
                // Asignar los atributos
                $args = $_POST['vehiculo'];
                if(!$args['visible']){
                    $args['visible'] = "0";
                }
                $vehiculo->sincronizar($args);
                // Validar
                $errores = $vehiculo->validar();
                if (empty($errores)) {
                // Guarda en la base de datos
                $resultado = $vehiculo->guardar();
            }

            $imagenes = $_FILES['imagenes']['tmp_name'];
            
            if (!is_null($imagenes->tmp_name)){
                $countfiles = count($imagenes);
            for ($i = 0; $i < $countfiles; $i++) {

                $imagen = new File($imagenes[$i]);
                // Generar un nombre único
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                // Realiza un resize a la imagen con intervention
                $image = Image::make($imagenes[$i])->fit(800, 600);
                // Setear la imagen
                $imagen->setImagen($nombreImagen);
                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                $imagen->vehiculoId = $id;
                $imagen->guardar();
            }
        }

            if ($resultado) {
                header('location: /admin');
            }
        }



        $router->render('vehiculos/actualizar', [
            'vehiculo' => $vehiculo,
            'imagenes' => $imagenes,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router)
    {
        
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];
            // peticiones validas
            if (validarTipoContenido($tipo)) {
                // Leer el id
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                
                $imagenes = File::where('vehiculoId', $id);
                foreach ($imagenes as $imagen){
                    $imagen->setImagen($imagen);
                }

                // encontrar y eliminar la vehiculo
                $vehiculo = Vehiculo::find($id);
                $resultado = $vehiculo->eliminar();
                // Redireccionar
                if ($resultado) {
                    header('location: /admin');
                }
            }
        }
    }
}