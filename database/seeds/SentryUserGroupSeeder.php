<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryUserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->delete();

        $userUser = Sentry::getUserProvider()->findByLogin('invitado@kentron.com.ve');
        $adminUser = Sentry::getUserProvider()->findByLogin('administrador@kentron.com.ve');

        $userGroup = Sentry::getGroupProvider()->findByName('Invitados');
        $adminGroup = Sentry::getGroupProvider()->findByName('Administradores');

        // Assign the groups to the users
        $userUser->addGroup($userGroup);
        $adminUser->addGroup($adminGroup);

        $this->command->info('Users assigned to groups seeded!');
    }
}
