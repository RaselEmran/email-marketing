<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::insert([
                ['name' => 'John Doe','email' => 'support@xcoder.io','status' => 'Active','password' => '$2y$10$K4wHIQ/wuHHqlx5LH7nOveaUDrqY/0d6AZfj7n6mzY9RwQ7csHdFO', 'role' => 'admin'],
                ['name' => 'David Backhum','email' => 'david@backhum.com','status' => 'Active','password' => '$2y$10$K4wHIQ/wuHHqlx5LH7nOveaUDrqY/0d6AZfj7n6mzY9RwQ7csHdFO', 'role' => ''],
                ['name' => 'data nardo','email' => 'data@nardo.com','status' => 'Banned','password' => '$2y$10$H.OJx5i6K59BwWMVBPI4suVuXo/nWYgD7tTjpjqvG.xbWGQmMrsqW', 'role' => ''],
                ['name' => 'demo','email' => 'demo@grameentek.com','status' => 'Banned','password' => '$2y$10$PlHX6h5So1F00cg1p6ozYegeqE0j96J4cMnIm8sG/dS2XgUh8IZZ2', 'role' => ''],
                ['name' => 'pola','email' => 'pola@pola.com','status' => 'Active','password' => '$2y$10$oqUUhTCQwAH5q93XsKdPFON/LYaOOZJlngz45jgAyNlxb9D6JpyCS', 'role' => '']

                ]);
    }
}
