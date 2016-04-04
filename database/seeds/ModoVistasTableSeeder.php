<?php

use Illuminate\Database\Seeder;
use App\ModoVista;

class ModoVistasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModoVista::create([
            'descripcion' => 'Página Estatica',
            'usuario_creacion_id' => 1,
            'usuario_modificacion_id' => 1,
            'version' => 1,
            'ind_visible' => 1
        ]);
        ModoVista::create([
            'descripcion' => 'Ventana Modal',
            'usuario_creacion_id' => 1,
            'usuario_modificacion_id' => 1,
            'version' => 1,
            'ind_visible' => 1
        ]);
    }

}
