<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'username' => 'Nguyễn Duy Tiến',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'address' => 'An Giang',
            'phone' => '0123456789',
            'role_id' => '1'
        ]);
    }
}
