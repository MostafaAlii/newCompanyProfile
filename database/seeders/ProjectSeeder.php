<?php
namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class ProjectSeeder extends Seeder {
    public function run() {
        Project::factory()->count(5)->create();
    }
}
