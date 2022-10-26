<?php

namespace Controllers;

use MVC\Router;
use Model\Imagenes;
use Intervention\Image\ImageManagerStatic as Image;

class ImagenesController
{
    public static function clientesfelices(Router $router)
    {

        isAuth();
        $imagenes = Imagenes::whereImg('seccion', 1, null, 'orden');
        // Ejecutar el código después de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
            $iargs = $_POST['imagen'];
            foreach($iargs as $iarg){
                $imagen = Imagenes::find($iarg['id']); 
                $imagen->sincronizar($iarg);
                $imagen->guardar();
            }
            $imagenes = $_FILES['imagenes']['tmp_name'];
            $imgType = $_FILES['imagenes']['type'];
            
            $countfiles = count($imagenes);
            for ($i = 0; $i < $countfiles; $i++) {
                if ($imgType[$i] !== 'image/jpeg' && $imgType[$i] !== 'image/png') {
                    continue;
                }
                $imagen = new Imagenes($imagenes[$i]);
                
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

                $imagen->seccion = 1;
                $imagen->guardar();
            }

                header('location: /admin/clientes-felices');
        }

        $router->render('admin/clientes-felices', [
            'imagenes' => $imagenes
        ]);
    }

    public static function agencia(Router $router)
    {

        isAuth();
        $imagenes = Imagenes::whereImg('seccion', 2, null, 'orden');
        // Ejecutar el código después de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $iargs = $_POST['imagen'];
            foreach($iargs as $iarg){
                $imagen = Imagenes::find($iarg['id']); 
                $imagen->sincronizar($iarg);
                $imagen->guardar();
            }

            $imagenes = $_FILES['imagenes']['tmp_name'];
            $imgType = $_FILES['imagenes']['type'];
            
            $countfiles = count($imagenes);
            for ($i = 0; $i < $countfiles; $i++) {
                if ($imgType[$i] !== 'image/jpeg' && $imgType[$i] !== 'image/png') {
                    continue;
                }
                $imagen = new Imagenes($imagenes[$i]);
                
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

                $imagen->seccion = 2;
                $imagen->guardar();
            }

                header('location: /admin/agencia');
        }

        $router->render('admin/agencia', [
            'imagenes' => $imagenes
        ]);
    }

    public static function eliminarImg()
    {
        $imgId = trim($_POST['imgId']);
        $imagenes = Imagenes::whereImg('id', $imgId);
        foreach ($imagenes as $imagen) {
            $imagen->eliminar();
        }

        echo json_encode($imagen);
    }
}
