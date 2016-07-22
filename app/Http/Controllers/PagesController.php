<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contenido;
use App\TipoPublicacion;
use Carbon\Carbon;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class PagesController extends Controller {

    public function getHome() {
        $data['tipo_publicaciones'] = TipoPublicacion
                ::where('tipo_publicaciones.ind_visible', '=', 1)
                ->orderBy('tipo_publicaciones.orden', 'asc')
                ->get();

        foreach ($data['tipo_publicaciones'] as $tipo_publicacion) {
            $data[strtolower($tipo_publicacion->descripcion)] = $tipo_publicacion->contenidos()
                    ->where('contenidos.ind_visible', '=', 1)
                    ->whereNotNull('contenidos.fondo')
                    ->whereDate('fecha_vigencia', '>=', Carbon::today()->toDateString())
                    ->get();
        }

        return view('pages.home', $data);
    }

    public function getAbout() {
        return view('pages.nosotros');
    }

    public function getContact() {
        return view('pages.contacto');
    }

    public function getProducts() {
        return view('pages.productos.index');
    }

    public function getKeruxInfo() {
        return view('pages.productos.kerux');
    }

    public function getKomatInfo() {
        return view('pages.productos.komat');
    }

    public function getCustomer() {
        return view('pages.clientes');
    }

    public function getSupport() {
        return view('pages.soporte');
    }

    public function getInfoProyecto($id) {
        $data['proyecto'] = Contenido::findOrFail($id);
        return view('pages.infoproyecto', $data);
    }

    public function getShow($url) {
        $data['contenido'] = Contenido
                ::where('url', '=', $url)
                ->where('contenidos.ind_visible', '=', 1)
                ->whereNotNull('contenidos.fondo')
                ->firstOrFail();
        return view('pages.contenido', $data);
    }

    public function postContact(ContactFormRequest $request) {
        $sent = Mail::send('emails.contacto', ['nombre' => $request->nombre, 'correo' => $request->correo,
            'telefono' => $request->telefono, 'mensaje' => $request->mensaje],
                function(Message $message) {
                    $message->to(env('MAIL_USERNAME'))->subject('Solicitud de Contacto');
                });

        $hubo_error = ($sent === 1) ? false : true;
        return ($hubo_error === true) ?  back()->with('error', 'Solicitud de Contacto No Enviada') :  back()->with('mensaje', 'Solicitud de Contacto Enviada');
    }

}
