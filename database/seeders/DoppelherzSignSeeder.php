<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoppelherzSignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doppelherz_signs')->insert([
            'name' => 'Đỗ Văn Thoại',
            'image' => '/uploads/signature/doppelherz/dovanthao.png',
        ]);
        DB::table('doppelherz_signs')->insert([
            'name' => 'Nguyễn Văn Huyên',
            'image' => '/uploads/signature/doppelherz/nguyenvanhuyen.png',
        ]);
        DB::table('doppelherz_signs')->insert([
            'name' => 'Đinh Công Đức',
            'image' => '/uploads/signature/doppelherz/dinhcongduc.png',
        ]);
    }
}
