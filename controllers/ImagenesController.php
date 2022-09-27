<?php

namespace Controllers;

use MVC\Router;
use Model\Imagenes;
use Intervention\Image\ImageManagerStatic as Image;

class ImagenesController
{
    public static function clientes(Router $router)
    {

        isAuth();
        $imagenes = Imagenes::all();

        $router->render('vehiculos/clientes', [
            'imagenes' => $imagenes
        ]);
    }

    public static function agregar(Router $router)
    {

        isAuth();
        $imagenes = [];
        // Ejecutar el código después de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagenes = $_FILES['imagenes']['tmp_name'];
            $imgType = $_FILES['imagenes']['type'];
            
            $countfiles = count($imagenes);
            for ($i = 0; $i < $countfiles; $i++) {
                if ($imgType[$i] !== 'image/jpeg' || $imgType[$i] !== 'image/png') {
                    continue;
                }
                $imagen = new Imagenes($imagenes[$i]);
                // Generar un nombre único
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
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
                debuguear($imagen);

                $imagen->seccion = 1;
                $imagen->guardar();
            }

                header('location: /clientes');
        }

        $router->render('vehiculos/clientes', [
            'imagenes' => $imagenes
        ]);
    }

    public static function eliminar()
    {
        $imgId = trim($_POST['imgId']);
        $imagenes = Imagenes::where('id', $imgId);
        foreach ($imagenes as $imagen) {
            $imagen->eliminar();
        }

        echo json_encode($imagen);
    }
}
