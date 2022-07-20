<?php

namespace App\Http\Traits;

use App\Models\Partner;
use Illuminate\Support\Facades\Session;

trait STrait
{
    public function accessVIP()
    {
        if(Session::get('code')=='sweetsica'){
            return true;
        }else{
            return false;
        }
    }

    public function partnerAdmin()
    {
        return Partner::latest()->get();
    }

    public function checkRole($role)
    {
        if($role){
            return Partner::latest()->where('type_contract', '=', 1)->get();
        }
    }
}
