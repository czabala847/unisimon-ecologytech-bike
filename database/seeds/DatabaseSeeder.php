<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        App\User::create(
            [
                'name' => 'Carlos Zabala',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456')
            ]
        )->assignRole('Admin');

        App\User::create(
            [
                'name' => 'Cliente Prueba',
                'email' => 'cliente@example.com',
                'password' => bcrypt('123456')
            ]
        )->assignRole('Client');
    }
}
