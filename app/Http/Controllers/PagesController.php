<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contenido;
use App\TipoPublicacion;
use Carbon\Carbon;
use App\Categoria;
use App\Topico;
use Illuminate\Http\Request;

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
        return view('pages.productos');
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

    public function getBusqueda(Request $request) {
        $categorias = Categoria::all();
        $request->category_id;
        $query = Topico::orderBy('titulo');
        if ($request->has('category_id')) {
            $query->categoria($request->category_id);
        }
        if($request->has('name')) {
            $names = explode(" ", $request->name);
            foreach ($names as $name) {
                $query->titulo($name)
                      ->orDescripcion($name)
                      ->orAcciones($name)
                      ->orTags($name);
            }
        }
        $topicos = $query->paginate(5);
        return view('pages.busqueda', compact('categorias', 'topicos'));
    }

    public function getInfoProyecto($id) {
        $data['proyecto'] = Contenido::findOrFail($id);
        return view('pages.infoproyecto', $data);
    }
    
    public function getShow($url) {
        $data['contenido'] = Contenido
                ::where('url','=', $url)
                ->where('contenidos.ind_visible', '=', 1)
                ->whereNotNull('contenidos.fondo')
                ->firstOrFail();
        return view('pages.contenido', $data);
    }
}