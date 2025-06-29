<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApplicationSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ApplicationSetting::create([
            'item_name' => 'apexdent',
            'item_short_name' => 'apexdent',
            'item_version' => '2.0',
            'company_name' => 'apexdent',
            'company_email' => 'bd.apexdent@gmail.com',
            'company_address' => 'Kalmunai, Sri Lanka',
            'developed_by' => 'apexdent',
            'developed_by_href' => 'http://apexdent.net/',
            'developed_by_title' => 'Your hope our goal',
            'developed_by_prefix' => 'Developed by',
            'support_email' => 'bd.apexdent@gmail.com',
            'language' => 'en',
            'is_demo' => '0',
            'time_zone' => 'Asia/Dhaka',
        ]);
    }
}
