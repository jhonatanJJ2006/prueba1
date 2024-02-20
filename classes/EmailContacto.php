<?php

namespace Classes;

use Exception;
use GuzzleHttp\Client;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\Api\TransactionalEmailsApi;

class EmailContacto {

    public $email;
    public $nombre;
    public $mensaje;
    
    public function __construct($email, $nombre, $mensaje)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    public function enviar() {
        // Desactivar la verificación de SSL para cURL
        $configa = [
            'verify' => false
        ];

        $contenido = '<html>';
        $contenido .= "<p><strong>Mensaje enviado por: " . $this->nombre . "</strong> " . "- " . $this->email . "</p>";
        $contenido .= "<p><strong>Contenido del Mensaje: </strong>" . $this->mensaje . "</p>";
        $contenido .= '</html>';

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new TransactionalEmailsApi(new Client($configa), $config);
        
        $sendSmtpEmail = new SendSmtpEmail([
            'subject' => 'Mensaje Contacto Militia Michael',
            'sender' => ['name' => 'Militia Michael', 'email' => $this->email],
            'to' => [['name' => $this->nombre, 'email' => '2jhonatanjara2@gmail.com']],
            'htmlContent' => $contenido 
        ]);
        
        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception) {
            header('Location: /contacto');
        }
    }
}