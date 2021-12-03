<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'Yogi Eka Prastiya',
            'username' => 'YoKYa',
            'email' => 'yogiekaprastiya1@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('super admin');
    }
}
