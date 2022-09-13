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
                'value' => 'logo.png'
            ],[
                'key' => 'site_home_banner',
                'value' => 'home_banner.png'
            ],[
                'key' => 'site_favicon',
                'value' => 'logo.ico'
            ],[
                'key' => 'site_facebook',
                'value' => 'https://www.facebook.com'
            ],[
                'key' => 'site_twitter',
                'value' => 'https://www.twitter.com'
            ]
        ];
        DB::table('settings')->insert($settings);
    }
}
