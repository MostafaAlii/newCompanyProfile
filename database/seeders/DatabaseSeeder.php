<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
            LaratrustSeeder::class,
            UserTableSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
