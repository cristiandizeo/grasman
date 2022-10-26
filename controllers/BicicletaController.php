<?php

namespace Controllers;

use MVC\Router;
use Model\Bicicleta;
use Model\Fileb;
use Intervention\Image\ImageManagerStatic as Image;

class BicicletaController
{
    public static function index(Router $router)
    {

        isAuth();
        $bicicletas = Bicicleta::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        $page = 'index';
        $router->render('admin/bicicletas/index', [
            'bicicletas' => $bicicletas,
            'resultado' => $resultado,
            'page' => $page
        ]);
    }

    public static function crear(Router $router)
    {

        isAuth();
        $bicicleta = new Bicicleta();
        $imagen = new Fileb();
        $errores = Bicicleta::getErrores();
        $errores = Fileb::getErrores();
        $imageness = [];
        // Ejecutar el código después de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Crea una nueva instancia */
            $bicicleta = new Bicicleta($_POST['bicicleta']);

            // Validar
            $errores = $bicicleta->validar();
            if (empty($errores)) {
                // Guarda en la base de datos
                $resultado = $bicicleta->guardar();
                $lastId = $bicicleta->LastId();
            }
            
            $imageness = $_FILES['imagenes']['tmp_name'];
            $imgType = $_FILES['imagenes']['type'];

            $countfiles = count($imageness);
            for ($i = 0; $i < $countfiles; $i++) {
                if ($imgType[$i] !== 'image/jpeg' && $imgType[$i] !== 'image/png') {
                    // debuguear($imgType[$i]);
                    continue;
                }
                $imagen = new Fileb($imageness[$i]);
                
                $date =  date("Ymd-hisa");
                // Generar un nombre único
                $nombreImagen =  $date . uniqid() . ".webp";

                // Realiza un resize a la imagen con intervention
                $image = Image::make($imageness[$i])->fit(800, 600);
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

                $imagen->bicicletaId = $lastId;
                $imagen->orden = $i;
                $imagen->guardar();
            }


            if ($resultado) {
                header('location: /admin/bicicletas');
            }
        }

        $router->render('admin/bicicletas/crear', [
            'errores' => $errores,
            'bicicleta' => $bicicleta,
            'imageness' => $imageness
        ]);
    }

    public static function actualizar(Router $router)
    {

        isAuth();

        $id = validarORedireccionar('/bicicletas');

        // Obtener los datos del bicicleta
        $bicicleta = Bicicleta::find($id);
        $imageness = Fileb::whereImg('bicicletaId', $id, null, 'orden');

        // Arreglo con mensajes de errores
        $errores = Bicicleta::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $iargs = $_POST['imagen'];
            foreach($iargs as $iarg){
                $imagen = Fileb::find($iarg['id']); 
                $imagen->sincronizar($iarg);
                $imagen->guardar();
            }

            // Asignar los atributos
            $args = $_POST['bicicleta'];
            // Mostrar publicacion en el sitio
            if (!$args['visible']) {
                $args['visible'] = "0";
            }
            $bicicleta->sincronizar($args);
            // Validar
            $errores = $bicicleta->validar();
            if (empty($errores)) {
                // Guarda en la base de datos
                $resultado = $bicicleta->guardar();
            }

            $imageness = $_FILES['imagenes']['tmp_name'];
            
            // comprobar si hay imagenes
            if ($imageness !== ['']) {
                //procesar cada imagen
                $countfiles = count($imageness);
                for ($i = 0; $i < $countfiles; $i++) {
                    $imagen = new Fileb($imageness[$i]);

                    $date =  date("Ymd-hisa");
                    // Generar un nombre único
                    $nombreImagen =  $date . uniqid() . ".webp";
                    
                    // Realiza un resize a la imagen con intervention
                    $image = Image::make($imageness[$i])->fit(800, 600);

                    // Setear la imagen
                    $imagen->setImagen($nombreImagen);
                    // Crear la carpeta para subir imagenes
                    if (!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }

                    // Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    // Le asigna el id del bicicleta
                    $imagen->bicicletaId = $id;
                    // Guardar en DB
                    $imagen->guardar();
                }
            }

            if ($resultado) {
                header('location: /admin/bicicletas');
            }
        }

        $router->render('admin/bicicletas/actualizar', [
            'bicicleta' => $bicicleta,
            'imageness' => $imageness,
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

                $imageness = Fileb::whereImg('bicicletaId', $id);
                foreach ($imageness as $imagen) {
                    $imagen->setImagen($imagen);
                }

                // encontrar y eliminar el bicicleta
                $bicicleta = Bicicleta::find($id);
                $resultado = $bicicleta->eliminar();
                // Redireccionar
                if ($resultado) {
                    header('location: /admin/bicicletas');
                }
        }
    }

    public static function eliminarImg()
    {
        $imgId = trim($_POST['imgId']);
        $imageness = Fileb::whereImg('id', $imgId);
        foreach ($imageness as $imagen) {
            $imagen->eliminar();
        }

        echo json_encode($imagen);
    }
}
