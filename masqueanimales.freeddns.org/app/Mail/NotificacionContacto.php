<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionContacto extends Mailable
{
    use Queueable, SerializesModels;
    protected $nombre, $apellidos, $contenido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $apellidos, $email, $contenido)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->contenido = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.contenidomail')
            ->subject("Solicitud de contacto desde Formulario web")
            ->with([
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "email" => $this->email,
                "contenido" => $this->contenido
            ]);
    }
}
