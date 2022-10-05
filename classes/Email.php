<?php

namespace Classes;

use Model\ActiveRecord;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends ActiveRecord
{

    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;

    public function __construct($args = [])
    {

        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
    }

    public static function nuevoMensaje()
    {
        $msj = new Email($_POST['mail']);

        if (isset($_FILES['imagenes']['tmp_name'])){
        $imagenes = $_FILES['imagenes']['tmp_name'];
    }
        //comprobar si estan vacios
        if (!empty($msj->nombre) && !empty($msj->email) && !empty($msj->telefono) && !empty($msj->mensaje)) {
            //comprobar email
            if (filter_var($msj->email, FILTER_VALIDATE_EMAIL)) {

                //Instancia de PHPMailer pasando `true` para habilitar excepciones
                $mail = new PHPMailer(true);

                try {
                    //Crear el objeto de email
                    $mail->isSMTP();
                    $mail->Host = $_ENV['MAIL_HOST'];
                    $mail->SMTPAuth = true;
                    $mail->Port = $_ENV['MAIL_PORT'];
                    $mail->Username = $_ENV['MAIL_USERNAME'];
                    $mail->Password = $_ENV['MAIL_PASSWORD'];

                    $mail->setFrom($msj->email, $msj->nombre);
                    $mail->addAddress('dizeoc@gmail.com', 'Grasman Autos');
                    $mail->Subject = 'Mensaje desde la web';

                    //Set HTML
                    $mail->isHTML(TRUE);
                    $mail->CharSet = 'UTF-8';

                    $contenido = '<html>';
                    $contenido .= "<p><strong>Nombre:</strong> " . $msj->nombre . "</p>";
                    $contenido .= "<p><strong>Telefono:</strong> " . $msj->telefono . "</p>";
                    $contenido .= "<p><strong>Mensaje:</strong> " . $msj->mensaje . "</p>";
                    
                    if(isset($imagenes)){
                foreach ($imagenes as $imagen){
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                    $mail->AddAttachment($imagen, $nombreImagen);
                }
            }


                    $contenido .= "</html>";

                    $mail->Body = $contenido;
                    //Enviar email
                    $mail->send();

                    echo json_encode(true);
                } catch (Exception $e) {
                    echo json_encode(false);
                }
            }
        }
    }
}