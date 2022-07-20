<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/tinh_tp.json";
        $json = json_decode(file_get_contents($path), true);
        foreach ($json as $item){
            Local::create([
                'name'=>$item['name_with_type'],
                'type' => $item['type'],
                'code' => $item['code'],
            ]);
        }
    }
}
