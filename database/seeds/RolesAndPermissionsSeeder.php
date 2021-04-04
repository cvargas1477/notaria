<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Role::create([ 'name' => 'admin']);
        $role_mesoncajero = Role::create([ 'name' => 'mesoncajero']);
        $role_meson = Role::create([ 'name' => 'meson']);
        $role_cajero = Role::create([ 'name' => 'cajero']);
       
        Role::create([ 'name' => 'super-admin']);

        $permissions = collect([
            'create service',
			'save service',
            'edit service',
            'can delete service',
            'update service',
			'can register service',
            'can delete post',
            'pay service',            
            'register user',
            'disable user',
            'edit all user',
            'report',
        ]);

        $permissions_by_role = [
            'admin' => [
                'create service',
                'save service',
                'edit service',
                'can delete service',
                'pay service', 
                'update service', 
                'register user',
                'disable user', 
                'edit all user',
                'report',           
            ],
            'mesoncajero' => [
                'create service', 
                'save service',
                'pay service',
                'report',
            ],
            'meson' => [
                'create service', 
                'save service',
            ],
            'cajero' => [
                'pay service',
                'report',                
            ],
        ];

        $permissions = $permissions->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $role_admin->syncPermissions($permissions_by_role['admin']);
        $role_mesoncajero->syncPermissions($permissions_by_role['mesoncajero']);
        $role_meson->syncPermissions($permissions_by_role['meson']);
        $role_cajero->syncPermissions($permissions_by_role['cajero']);

    }
}
