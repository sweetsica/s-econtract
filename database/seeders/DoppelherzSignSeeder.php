<?php

namespace Database\Seeders;

use App\Models\DoppelherzSign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoppelherzSignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoppelherzSign::create([
            'name' => 'Đỗ Văn Thoại',
            'image' => '/uploads/signature/doppelherz/dovanthao.png',
        ]);
        DoppelherzSign::create([
            'name' => 'Nguyễn Văn Huyên',
            'image' => '/uploads/signature/doppelherz/nguyenvanhuyen.png',
        ]);
        DoppelherzSign::create([
            'name' => 'Đinh Công Đức',
            'image' => '/uploads/signature/doppelherz/dinhcongduc.png',
        ]);
    }
}
