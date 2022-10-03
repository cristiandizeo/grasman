[1mdiff --git a/controllers/VehiculoController.php b/controllers/VehiculoController.php[m
[1mindex c790a26..43dfd94 100644[m
[1m--- a/controllers/VehiculoController.php[m
[1m+++ b/controllers/VehiculoController.php[m
[36m@@ -168,9 +168,6 @@[m [mclass VehiculoController[m
         isAuth();[m
 [m
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {[m
[31m-            $tipo = $_POST['tipo'];[m
[31m-            // peticiones validas[m
[31m-            if (validarTipoContenido($tipo)) {[m
                 // Leer el id[m
                 $id = $_POST['id'];[m
                 $id = filter_var($id, FILTER_VALIDATE_INT);[m
[36m@@ -187,7 +184,6 @@[m [mclass VehiculoController[m
                 if ($resultado) {[m
                     header('location: /admin');[m
                 }[m
[31m-            }[m
         }[m
     }[m
 [m
[1mdiff --git a/includes/funciones.php b/includes/funciones.php[m
[1mindex 095623a..9737b85 100644[m
[1m--- a/includes/funciones.php[m
[1m+++ b/includes/funciones.php[m
[36m@@ -22,13 +22,6 @@[m [mfunction s($html) : string {[m
     return $s;[m
 }[m
 [m
[31m-[m
[31m-// Valida tipo de petición[m
[31m-function validarTipoContenido($tipo){[m
[31m-    $tipos = ['vendedor', 'vehiculo'];[m
[31m-    return in_array($tipo, $tipos);[m
[31m-}[m
[31m-[m
 // Muestra los mensajes[m
 function mostrarNotificacion($codigo) {[m
     $mensaje = '';[m
[1mdiff --git a/public/imagenes/2ba1b1e5f88a3adf1c274953c8c0b8d6.jpg b/public/imagenes/2ba1b1e5f88a3adf1c274953c8c0b8d6.jpg[m
[1mdeleted file mode 100644[m
[1mindex b205527..0000000[m
Binary files a/public/imagenes/2ba1b1e5f88a3adf1c274953c8c0b8d6.jpg and /dev/null differ
[1mdiff --git a/public/imagenes/d4ffbeefc247def6c51cea13bce5906e.jpg b/public/imagenes/d4ffbeefc247def6c51cea13bce5906e.jpg[m
[1mdeleted file mode 100644[m
[1mindex 3017b89..0000000[m
Binary files a/public/imagenes/d4ffbeefc247def6c51cea13bce5906e.jpg and /dev/null differ
[1mdiff --git a/public/imagenes/e0f321a9ae83c59675e1fa87926f101c.jpg b/public/imagenes/e0f321a9ae83c59675e1fa87926f101c.jpg[m
[1mdeleted file mode 100644[m
[1mindex a88e3d0..0000000[m
Binary files a/public/imagenes/e0f321a9ae83c59675e1fa87926f101c.jpg and /dev/null differ
