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
        App\User::create(
            [
                'name' => 'Carlos Zabala',
                'email' => 'carlos@example.com',
                'password' => bcrypt('123456')
            ]
        );
    }
}
