<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Member;
use App\Models\Partner;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function testLocal(){
        $local = Local::with('parent','children')->find(769);
        $member = Member::with('member_location')->get();
        $partner = Partner::with('location','delivery_location')->get();
        dd($partner);
    }
}
