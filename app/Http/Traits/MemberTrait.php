<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Session;

trait STrait
{
    public function accessVIP()
    {
        if(Session::get('member_id')){
            return 'true';die;
        }else{
            return '';
        }
    }
}
