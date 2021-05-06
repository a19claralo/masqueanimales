<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotificacionContacto;
use Illuminate\Support\Facades\Mail;

class ContactarController extends Controller
{
    public function create()
    {
        return view('correos.create');
    }

    /**
     * Método para enviar los correos.
     */
    public function enviar(Request $request)
    {
        // Creamos un objeto de la clase NotificacionContacto
        $mailable = new NotificacionContacto($request->nombre, $request->apellidos, $request->email, $request->contenido);

        // Enviamos el correo al destinatario
        Mail::to('a19claralo@iessanclemente.net')->send($mailable);
        return back()->with('estado', 'Sus datos de han enviado correctamente. Contactaremos con usted lo antes posible. GRACIAS.');
    }
}
