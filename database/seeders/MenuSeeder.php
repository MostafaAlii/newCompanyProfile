<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class MenuSeeder extends Seeder {
    public function run(){
        DB::table('menus')->delete();
        $menus = [
            [
                'name' => 'الرئيسية',
                'link' => 'http://newcompanyprofile.test/',
                'status' => 1,
                'sorting' => 1,
                'username' => 'superadmin',
                'created_at' => now(),
            ],[
                'name' => 'من نحن',
                'link' => 'http://newcompanyprofile.test/about',
                'status' => 1,
                'sorting' => 2,
                'username' => 'superadmin',
                'created_at' => now(),
            ],[
                'name' => 'اتصل بنا',
                'link' => 'http://newcompanyprofile.test/contact',
                'status' => 1,
                'sorting' => 3,
                'username' => 'superadmin',
                'created_at' => now(),
            ]
        ];
        DB::table('menus')->insert($menus);
    }
}
