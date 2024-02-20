<?php

namespace Classes;

use Exception;
use GuzzleHttp\Client;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\Api\TransactionalEmailsApi;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Desactivar la verificación de SSL para cURL
        $configa = [
            'verify' => false
        ];

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Registrado Correctamente tu cuenta en DevWebCamp; pero es necesario confirmarla</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/auth/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";       
        $contenido .= "<p>Si tu no creaste esta cuenta; puedes ignorar el mensaje</p>";
        $contenido .= '</html>';

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new TransactionalEmailsApi(new Client($configa), $config);
        
        $sendSmtpEmail = new SendSmtpEmail([
            'subject' => 'Mensaje Confirmación Militia Michael',
            'sender' => ['name' => 'Militia Michael', 'email' => $this->email],
            'to' => [['name' => $this->nombre, 'email' => '2jhonatanjara2@gmail.com']],
            'htmlContent' => $contenido 
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception) {
            header('Location: /auth/registro');
        }
    }

    public function enviarInstrucciones() {
        // Desactivar la verificación de SSL para cURL
        $configa = [
            'verify' => false
        ];

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/auth/reestablecer?token=" . $this->token . "'>Reestablecer Password</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new TransactionalEmailsApi(new Client($configa), $config);
        
        $sendSmtpEmail = new SendSmtpEmail([
            'subject' => 'Mensaje Reestablecer Militia Michael',
            'sender' => ['name' => 'Militia Michael', 'email' => $this->email],
            'to' => [['name' => $this->nombre, 'email' => '2jhonatanjara2@gmail.com']],
            'htmlContent' => $contenido 
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception) {
            header('Location: /auth/registro');
        }
    }
}