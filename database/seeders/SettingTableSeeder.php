<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class SettingTableSeeder extends Seeder {
    public function run(){
        DB::table('settings')->delete();
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Company Name',
            ],[
                'key' => 'site_title',
                'value' => 'CN',
            ],[
                'key' => 'site_email',
                'value' => 'company@test.com'
            ],[
                'key' => 'site_phone',
                'value' => '01015558628'
            ],[
                'key' => 'site_address',
                'value' => 'Company Address'
            ],[
                'key' => 'site_logo',
                'value' => ''
            ],[
                'key' => 'site_favicon',
                'value' => ''
            ],[
                'key' => 'site_facebook',
                'value' => 'https://www.facebook.com'
            ],[
                'key' => 'site_twitter',
                'value' => 'https://www.twitter.com'
            ],[
                'key' => 'home_cover',
                'value' => ''
            ],[
                'key' => 'home_description',
                'value' => ''
            ],[
                'key' => 'home_primary_title',
                'value' => ''
            ],[
                'key' => 'home_secondary_title',
                'value' => ''
            ]
        ];
        DB::table('settings')->insert($settings);
    }
}
