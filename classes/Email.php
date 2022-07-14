<?php

namespace Classes;

use Model\ActiveRecord;
use MVC\Router;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends ActiveRecord
{

    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;

    public function __construct($args = []){ 
        
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
    }

    public function enviarInstrucciones()
    {
        //Crear el objeto de email
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['MAIL_PORT'];
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];

        // $mail->setFrom($nombre, $email);
        $mail->addAddress('dizeoc@gmail.com', 'Cristian Dizeo');
        $mail->Subject = 'Mensaje desde la web';
        $mail->Subject = 'Reestablece tu password';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>, para restablecer tu password has click en el siguiente enlace: </p>";
        $contenido .= "<p>Presiona aqui: <a href='" . $_ENV['SERVER_HOST'] . "recuperar?token=" . $this->token . "'> Reestablecer password</a></p>";
        $contenido .= "<p>Si no has solicitado esto, ignora este mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar email
        $mail->send();
    }

    public function nuevoMensaje()
    {       
        $emailv = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        if($emailv){
        //Crear el objeto de email
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '5faeaa31a7ab36';
            $mail->Password = 'b169c323834b2a';

            $mail->setFrom($this->email, $this->nombre);
            $mail->addAddress('dizeoc@gmail.com', 'Cristian Dizeo');
            $mail->Subject = 'Mensaje desde la web';

            //Set HTML
            $mail->isHTML(TRUE);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= "<p><strong>Nombre:</strong> " . $this->nombre . "</p>";
            $contenido .= "<p><strong>Telefono:</strong> " . $this->telefono . "</p>";
            $contenido .= "<p><strong>Mensaje:</strong> " . $this->mensaje . "</p>";
            $contenido .= "</html>";
            
            $mail->Body = $contenido;
            //Enviar email
            $mail->send();
        } else {
            return false;
        }
    }
}