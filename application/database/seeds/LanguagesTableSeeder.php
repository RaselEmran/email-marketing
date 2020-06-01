<?php

use App\Models\Translation\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Language::insert([
            ['locale' => 'en_US', 'status' => 1]
        ]);
    }
}
