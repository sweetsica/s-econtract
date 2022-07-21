<?php

namespace App\Models;

use App\Enum\CommonEnum;
use App\Enum\InfoDoppelherzEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function setNameDoppelherzAttribute($value)
    {
        switch ($value){
            case "0":
                $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone0;
//                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition0;
                break;
            case "1":
                $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone1;
//                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition1;
                break;
            case "2":
                $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone2;
//                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition2;
                break;
            case "3":
                $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone3;
//                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition3;
                break;
            case "4":
                $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone4;
//                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition4;
                break;
            case "5":
                $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone5;
//                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition5;
                break;
            default:
                return $value;
        }
    }
    public function setBankDoppelherzAttribute($value)
    {
        switch ($value){
            case "0":
                $this->attributes['store_bank_name_doppelherz'] = InfoDoppelherzEnum::DoppelherzVCBBank;
                $this->attributes['store_bank_number_doppelherz'] = InfoDoppelherzEnum::DoppelherzVCBBankNumb;
                break;
            case "1":
                $this->attributes['store_bank_name_doppelherz'] = InfoDoppelherzEnum::DoppelherzVPBank;
                $this->attributes['store_bank_number_doppelherz'] = InfoDoppelherzEnum::DoppelherzVPBankNumb;
                break;
            default:
                return $value;
        }
    }

    public function setStoreContractTypeAttribute($value){
        switch ($value){
            case "1":
                $this->attributes['store_contract_type'] = CommonEnum::CONTRACT_OTC_NEW_POLICY;
                break;
            case "2":
                $this->attributes['store_contract_type'] = CommonEnum::CONTRACT_OTC_JAPAN;
                break;
            case "3":
                $this->attributes['store_contract_type'] = CommonEnum::CONTRACT_OTC_GERMANY;
                break;
        }
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class,'partnerId','id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','member_code');
    }

    public function doppelherz()
    {
        return $this->belongsTo(DoppelherzSign::class,'store_sign_img_doppelherz','id');
    }

    public function local_dkkd()
    {
        return $this->belongsTo(Local::class,'store_local_DKKD','id');
    }

    public function local_gh()
    {
        return $this->belongsTo(Local::class,'store_local_GH','id');
    }

}
