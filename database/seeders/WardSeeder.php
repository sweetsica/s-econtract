<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/xa_phuong.json";
        $json = json_decode(file_get_contents($path), true);
        foreach ($json as $item){
            Local::create([
                'name'=>$item['name_with_type'],
                'type' => $item['type'],
                'parent_id' => $item['parent_code'],
                'code'=>$item['code'],
            ]);
        }
    }
}
