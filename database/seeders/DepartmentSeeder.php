<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Phòng IT',
            'description' => 'Phòng IT',
            'location_id' => '829',
        ]);
        Department::create([
            'name' => 'Sales',
            'description' => 'Phòng Sales',
            'location_id' => '829',
        ]);
    }
}
