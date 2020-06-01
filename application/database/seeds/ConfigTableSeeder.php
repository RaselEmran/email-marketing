<?php

use App\Models\Config\Config;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Config::insert([
            ['key' => 'site_name', 'value' => 'Simple Email Marketting'],
            ['key' => 'company_email', 'value' => 'xcoderdotio@gmail.com'],
            ['key' => 'company_address', 'value' => 'Bangladesh'],
            ['key' => 'sidebar_theme', 'value' => 'red-light'],
            ['key' => 'privacy', 'value' => 'Please update you privacy policy. This is dummy text.'],
            ['key' => 'termCondition', 'value' => "<p>Please update you Terms And Condition. This is dummy text. Once you <a href='/privacy'>update</a>, your content will appear here</p>
"],
        ]);
    }
}
