<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = factory(User::class)->create([
            'name' => 'Administrador',
            'email' => 'admin@notaria.com',
            'enabled' => true,
        ]);

        $user_cristian = factory(User::class)->create([
            'name' => 'Cristian',
            'email' => 'cristian@notaria.com',
            'enabled' => true,
        ]);

        $user_meson = factory(User::class)->create([
            'name' => 'Meson',
            'email' => 'meson@notaria.com',
            'enabled' => true,
        ]);

        $user_mesoncajero = factory(User::class)->create([
            'name' => 'MesonCajero',
            'email' => 'mesoncajero@notaria.com',
            'enabled' => true,
        ]);

        $user_cajero = factory(User::class)->create([
            'name' => 'Cajero',
            'email' => 'cajero@notaria.com',
            'enabled' => true,
        ]);

        $user_super_admin = factory(User::class)->create([
            'name' => 'Super Admin Zen',
            'email' => 'super.admin@notaria.com',
            'enabled' => true,
        ]);

        factory(User::class, 30)->make()->each(function($user) {
            $user->save();
            $user->assignRole('meson');
        });

        $user_admin->assignRole('admin');
        $user_cristian->assignRole('admin');
        $user_meson->assignRole('meson');
        $user_mesoncajero->assignRole('mesoncajero');
        $user_cajero->assignRole('cajero');
        $user_super_admin->assignRole('super-admin');
    }
}
