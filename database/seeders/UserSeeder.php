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
            'name' => 'YoKYa',
            'username' => 'YoKYa',
            'email' => 'yokya@yokya.id',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('super admin');
    }
}
