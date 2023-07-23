<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [ 'role_name' => 'Quản Trị Viên' ]
        );
        Role::create(
            [ 'role_name' => 'Tác Giả' ]
        );
        Role::create(
            [ 'role_name' => 'Đọc Giả' ]
        );
    }
}
