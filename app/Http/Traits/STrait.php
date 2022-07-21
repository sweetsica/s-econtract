<?php

namespace App\Http\Traits;

use App\Enum\CommonEnum;
use App\Models\Partner;
use Illuminate\Support\Facades\Session;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

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

    public function show_contract($contract_info)
    {
        switch ($contract_info->store_contract_type){
            case CommonEnum::CONTRACT_OTC_NEW_POLICY:
                $pdf = PDF::loadView('/contract_otc_new_policy', ["info" => $contract_info]);
                return $pdf;
            case CommonEnum::CONTRACT_OTC_GERMANY:
                $pdf = PDF::loadView('/contract_otc_germany', ["info" => $contract_info]);
                return $pdf;
            case CommonEnum::CONTRACT_OTC_JAPAN:
                $pdf = PDF::loadView('/contract_otc_japan', ["info" => $contract_info]);
                return $pdf;
            default:
                return false;
        }

    }
}
