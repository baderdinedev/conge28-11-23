<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $responsableRole = Role::where('name', 'responsable')->first();

        if (!$responsableRole) {
            $this->command->error('Role "responsable" does not exist. Run the RolesTableSeeder first.');
            return;
        }
        $userExists = User::where('email', 'responsable@example.com')->exists();

        if (!$userExists) {
            User::create([
                'name' => 'Baderdine ben ibrahim',
                'email' => 'baderdinedev@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => $responsableRole->id,
            ]);

            $this->command->info('User with "responsable" role created successfully.');
        } else {
            $this->command->info('User with "responsable" role already exists.');
        }
    }
}
