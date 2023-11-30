<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = Role::find(2);
        \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => \Faker\Factory::create()->name,
                'email' => \Faker\Factory::create()->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role_id' => $role->id,
            ]);
        }
    }
}
