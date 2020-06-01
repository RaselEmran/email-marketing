<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ConfigTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(LocalesTableSeeder::class);
        $this->call(TemplateTableSeeder::class);
        if(env('APP_ENV', false) == 'demo') {
            $this->call(UsersTableSeeder::class);
        }

        Model::reguard();
    }
}
