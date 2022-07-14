<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Bảo',
            'email' => 'baonn@sweetisca.com',
            'password' => bcrypt('tieuhoa195'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@tbht.vn',
            'password' => bcrypt('123456'),
        ]);
    }
}
