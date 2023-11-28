<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Check if the role already exists
        $roleExists = Role::where('name', 'responsable')->exists();

        if (!$roleExists) {
            // Create the "responsable" role
            Role::create([
                'name' => 'responsable',
            ]);

            $this->command->info('Role "responsable" created successfully.');
        } else {
            $this->command->info('Role "responsable" already exists.');
        }
    }
}
