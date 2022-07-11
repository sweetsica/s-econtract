<?php

namespace Database\Seeders;

use App\Models\DoppelherzSign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LocationSeeder::class,
            DepartmentSeeder::class,
            DoppelherzSign::class
        ]);
    }
}
