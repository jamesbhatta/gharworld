<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::firstOrCreate(['name' => '*.user']);
         Permission::firstOrCreate(['name' => 'create.user']);
         Permission::firstOrCreate(['name' => 'edit.user']);
         Permission::firstOrCreate(['name' => 'view.user']);
         Permission::firstOrCreate(['name' => 'destroy.user']);
 
     
    }
}
