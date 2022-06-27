<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/local.json";
        $json = json_decode(file_get_contents($path), true);
        foreach ($json as $province) {
            $province_insert = Local::create([
                'name' => $province['name'],
                'code' => $province['code'],
                'type' => 'province'
            ]);
            foreach ($province['districts'] as $district) {
                $district_insert = Local::create([
                    'name' => $district['name'],
                    'type' => 'district',
                    'parent_id' => $province_insert->id
                ]);
                foreach ($district['wards'] as $ward) {
                    Local::create([
                        'name' => $ward['name'],
                        'type' => 'ward',
                        'prefix' => $ward['prefix'],
                        'parent_id' => $district_insert->id
                    ]);
                }
            }
        }
    }
}
