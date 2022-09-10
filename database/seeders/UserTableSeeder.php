<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UserTableSeeder extends Seeder {
    use WithoutModelEvents;
    public function run() {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123123123'),
        ]);
        $user->attachRole('super_admin');
    }
}
