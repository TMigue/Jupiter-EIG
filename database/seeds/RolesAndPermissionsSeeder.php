<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reseteamos cache de permisos y roles
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos
        Permission::create(['name' => 'users-admin']);
        Permission::create(['name' => 'terceros-create']);
        Permission::create(['name' => 'terceros-edit']);
        Permission::create(['name' => 'terceros-show']);
        Permission::create(['name' => 'terceros-admin']);
        Permission::create(['name' => 'propuestas-create']);
        Permission::create(['name' => 'propuestas-edit']);
        Permission::create(['name' => 'propuestas-show']);
        Permission::create(['name' => 'propuestas-admin']);
        Permission::create(['name' => 'crear documentos']);

        // roles
        $role = Role::create(['name' => 'ayudante'])
            ->givePermissionTo([
                'terceros-create', 'terceros-edit', 'terceros-show',
                'propuestas-create', 'propuestas-edit', 'propuestas-show',
            ]);

        $role = Role::create(['name' => 'visualizador'])
            ->givePermissionTo(['terceros-show', 'propuestas-show']);

        $role = Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

    }
}
