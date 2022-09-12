<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
            LaratrustSeeder::class,
            UserTableSeeder::class,
            SettingTableSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            PartnerTableSeeder::class,
        ]);
    }
}
