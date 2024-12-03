<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['account' => 'admin', 'password' => Hash::make('admin'), 'name' => '배현진', 'gender' => '0','profile' => '/profile/p1.png'],
            ['account' => 'admin2', 'password' => Hash::make('admin'), 'name' => '배짜장', 'gender' => '1','profile' => '/profile/p2.png'],
            ['account' => 'admin3', 'password' => Hash::make('admin'), 'name' => '김레이', 'gender' => '1','profile' => '/profile/p3.png'],
            ['account' => 'admin4', 'password' => Hash::make('admin'), 'name' => '이봉봉', 'gender' => '1','profile' => '/profile/default.png'],
        ];
        foreach($data as $item) {
            User::create($item);
        }
    }
}
