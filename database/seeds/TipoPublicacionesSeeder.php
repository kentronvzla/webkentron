<?php

use Illuminate\Database\Seeder;
use App\TipoPublicacion;

class TipoPublicacionesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        TipoPublicacion::create([
            'descripcion' => 'Noticias',
            'pagina' => 'pages.home.noticias',
            'orden' => 1,
            'max_width_img' => 1900,
            'max_heigth_img' => 1080,
            'usuario_creacion_id' => 1,
            'usuario_modificacion_id' => 1,
            'version' => 1,
            'ind_visible' => 1
        ]);
        TipoPublicacion::create([
            'descripcion' => 'Proyectos',
            'pagina' => 'pages.home.proyectos',
            'orden' => 2,
            'max_width_img' => 1900,
            'max_heigth_img' => 1080,
            'usuario_creacion_id' => 1,
            'usuario_modificacion_id' => 1,
            'version' => 1,
            'ind_visible' => 1
        ]);
        TipoPublicacion::create([
            'descripcion' => 'Articulos',
            'pagina' => 'pages.home.articulos',
            'orden' => 3,
            'max_width_img' => 1900,
            'max_heigth_img' => 1080,
            'usuario_creacion_id' => 1,
            'usuario_modificacion_id' => 1,
            'version' => 1,
            'ind_visible' => 1
        ]);
    }

}
