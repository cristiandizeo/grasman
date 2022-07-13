<?php

namespace Classes;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// use Dotenv\Dotenv as Dotenv;

// $dotenv = Dotenv::createImmutable('../includes/.env');
// $dotenv->safeLoad();

class Email
{

    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;

    public function __construct($nombre, $email, $telefono, $mensaje)
    {   
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    public function enviarInstrucciones()
    {
        //Crear el objeto de email
        $mail = new PHPMailer();
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
        debuguear('estas');
        if (!empty($nombre) && !empty($email) && !empty($telefono) && !empty($mensaje)) {

            //Crear el objeto de email
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['MAIL_PORT'];
            $mail->Username = $_ENV['MAIL_USER'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];

            $mail->setFrom($email, $nombre);
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
            debuguear($mail);
            //Enviar email
            $mail->send();
        }
    }
}
