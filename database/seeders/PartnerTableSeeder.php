<?php
namespace Database\Seeders;
use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class PartnerTableSeeder extends Seeder{
    public function run() {
        Partner::factory()->count(10)->create();
    }
}
