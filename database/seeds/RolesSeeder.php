<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminEmail =  'jmsbhatta@gmail.com';

        // Create Admin Role
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $adminUser = \App\User::whereEmail($adminEmail)->first() ?? Factory(App\User::class)->create([
            'name' => 'James Bhatta',
            'email' => $adminEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $adminUser->assignRole($admin);

        // Create User Role
        $user = Role::firstOrCreate(['name' => 'user']);
    }
}
