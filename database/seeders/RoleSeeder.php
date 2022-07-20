<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::get();
        if (!$roles->isEmpty()) {
            foreach ($roles as $role) {
                $role->delete();
            }
        }
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Sale admin',
            'description' => 'Quản lý bán hàng',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Quản lý',
            'description' => 'Quản lý',
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Nhân viên',
            'description' => 'Nhân viên',
        ]);
    }
}
