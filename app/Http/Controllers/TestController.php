<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Member;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class TestController extends Controller
{
    //
    public function testLocal(){
        $local = Local::with('parent','children')->find(769);
        $member = Member::with('member_location')->get();
        $partner = Partner::with('location','delivery_location')->get();
        dd($partner);
    }

    public function testPdf(){
        $pdf = PDF::loadView('/contract_otc_new_policy');
        $time = Carbon::now()->format('d-m-Y');
        $name = 'hop-dong-dien-tu-' . $time;
        return $pdf->stream($name . '.pdf');
    }

    public function testContractRegister(Request $request){
        return response()->json($request->all(),200);
    }
}
