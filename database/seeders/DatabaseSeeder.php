<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::updateOrCreate(['name' => 'admin'],['name' => 'admin']);
        Role::updateOrCreate(['name' => 'customer'], ['name' => 'customer']);

        $admin = User::factory()->create([
            'nama_depan' => 'Admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'password' => Hash::make('admin12345')
        ]);

        $admin->assignRole('admin');
    }
}
