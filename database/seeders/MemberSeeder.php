<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = Member::create([
             'member_name' => 'Phạm Minh Hải',
             'member_code' => 'MTT422',
             'email' => 'it_manager@tbht.vn',
             'phone' => '0383668899',
             'password' => bcrypt('123456'),
             'location_id' => '829',
             'address' => 'Trung Kính, Phường Yên Hòa, Quận Cầu Giấy, TP Hà Nội',
         ]);
          $member->roles()->attach([3]);
          $member->department()->attach([1]);

        $member = Member::create([
            'member_name' => 'Bảo',
            'member_code' => 'TBHT195',
            'email' => 'baonn@sweetisca.com',
            'phone' => '0915588000',
            'password' => bcrypt('tieuhoa195'),
            'location_id' => '829',
            'address' => 'TP Hà Nội',
        ]);
        $member->roles()->attach([3]);
        $member->department()->attach([1]);

    }
}
