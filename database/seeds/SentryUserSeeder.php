<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create([
            'email' => 'administrador@kentron.com.ve',
            'password' => '12345678',
            'first_name' => 'Administrador',
            'last_name' => 'Kentron',
            'activated' => 1,
        ]);

        Sentry::getUserProvider()->create([
            'email' => 'invitado@kentron.com.ve',
            'password' => '12345678',
            'first_name' => 'Invitado',
            'last_name' => 'Kentron',
            'activated' => 1,
        ]);

        $this->command->info('Users seeded!');
    }

}
