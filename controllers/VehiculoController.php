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
        $page = 'index';

        $router->render('admin/index', [
            'vehiculos' => $vehiculos,
            'resultado' => $resultado,
            'page' => $page
        ]);
    }

    public static function crear(Router $router)
    {

        isAuth();
        $vehiculo = new Vehiculo();
        $imagen = new File();
        $errores = Vehiculo::getErrores();
        $errores = File::getErrores();
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
            $imgType = $_FILES['imagenes']['type'];

            $countfiles = count($imagenes);
            for ($i = 0; $i < $countfiles; $i++) {
                if ($imgType[$i] !== 'image/jpeg' && $imgType[$i] !== 'image/png') {
                    // debuguear($imgType[$i]);
                    continue;
                }
                $imagen = new File($imagenes[$i]);

                $date =  date("Ymd-hisa");
                // Generar un nombre único
                $nombreImagen =  $date . uniqid() . ".webp";

                // Realiza un resize a la imagen con intervention
                $image = Image::make($imagenes[$i])->fit(800, 600);
                // get file size
                $image->filesize();
                // Setear la imagen
                $imagen->setImagen($nombreImagen);
                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                $imagen->vehiculoId = $lastId;
                $imagen->orden = $i;
                $imagen->guardar();
            }


            if ($resultado) {
                header('location: /admin');
            }
        }

        $router->render('admin/vehiculos/crear', [
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

        $orden = 0;
        foreach ($imagenes as $imagen) {
            if ($imagen->vehiculoId === $vehiculo->id) {
                $orden++;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['vehiculo'];
            // Mostrar publicacion en el sitio
            if (!$args['visible']) {
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

            // comprobar si hay imagenes
            if ($imagenes !== ['']) {
                //procesar cada imagen
                $countfiles = count($imagenes);
                for ($i = 0; $i < $countfiles; $i++) {

                    $imagen = new File($imagenes[$i]);

                    $date =  date("Ymd-hisa");
                    // Generar un nombre único
                    $nombreImagen =  $date . uniqid() . ".webp";

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
                    // Le asigna el id del vehiculo
                    $imagen->vehiculoId = $id;
                    $imagen->orden = $orden;

                    // Guardar en DB
                    $imagen->guardar();
                }
            }

            if ($resultado) {
                header('location: /admin');
            }
        }
        foreach ($imagenes as $imagen) {
            if ($imagen->orden === $vehiculo->id) {
                $orden++;
            }
        }
        $router->render('admin/vehiculos/actualizar', [
            'vehiculo' => $vehiculo,
            'imagenes' => $imagenes,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router)
    {

        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $imagenes = File::whereImg('vehiculoId', $id);
            foreach ($imagenes as $imagen) {
                $imagen->setImagen($imagen);
            }

            // encontrar y eliminar el vehiculo
            $vehiculo = Vehiculo::find($id);
            $resultado = $vehiculo->eliminar();
            // Redireccionar
            if ($resultado) {
                header('location: /admin');
            }
        }
    }

    public static function eliminarImg()
    {
        $imgId = trim($_POST['imgId']);
        $imagenes = File::whereImg('id', $imgId);
        foreach ($imagenes as $imagen) {
            $imagen->eliminar();
        }

        echo json_encode($imagen);
    }
}