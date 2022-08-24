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
                return $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone0;
//                return $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition0;
            case "1":
                return $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone1;
//                return $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition1;
            case "2":
                return $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone2;
//                return $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition2;
            case "3":
                return $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone3;
//                return $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition3;
            case "4":
                return $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone4;
//                return $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition4;
            case "5":
                return $this->attributes['store_sign_img_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone5;
//                return $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition5;
            default:
                return $value;
        }
    }
//    public function setBankDoppelherzAttribute($value)
//    {
//        switch ($value){
//            case "0":
//                $this->attributes['store_bank_name_doppelherz'] = InfoDoppelherzEnum::DoppelherzVCBBank;
//                $this->attributes['store_bank_number_doppelherz'] = InfoDoppelherzEnum::DoppelherzVCBBankNumb;
//                break;
//            case "1":
//                $this->attributes['store_bank_name_doppelherz'] = InfoDoppelherzEnum::DoppelherzVPBank;
//                $this->attributes['store_bank_number_doppelherz'] = InfoDoppelherzEnum::DoppelherzVPBankNumb;
//                break;
//            default:
//                return $value;
//        }
//    }

    public function setStoreContractTypeAttribute($value){
        switch ($value){
            case "1":
                return $this->attributes['store_contract_type'] = CommonEnum::CONTRACT_OTC_NEW_POLICY;
            case "2":
                return $this->attributes['store_contract_type'] = CommonEnum::CONTRACT_OTC_JAPAN;
            case "3":
                return $this->attributes['store_contract_type'] = CommonEnum::CONTRACT_OTC_GERMANY;
        }
    }

    public function setStoreEffectAttribute($value)
    {
        switch ($value){
            case "Vùng 1: Hà Nội và Tây Bắc":
                return  $this->attributes['store_effect'] = 1;
            case "Vùng 2: Duyên Hải và Đông Bắc":
                return  $this->attributes['store_effect'] = 2;
            case "Vùng 3: Miền Trung":
                return  $this->attributes['store_effect'] = 3;
            case "Vùng 4: Tây Nguyên":
                return  $this->attributes['store_effect'] = 4;
            case "Vùng 5: Hồ Chí Minh và miền Đông":
                return  $this->attributes['store_effect'] = 5;
            case "Vùng 6: Miền Tây":
                return  $this->attributes['store_effect'] = 6;
            case "Online":
                return  $this->attributes['store_effect'] = 7;
        }
    }

    public function getStoreEffectAttribute($value)
    {
        switch ($value){
            case "1":
                return $this->attributes['store_effect'] = 'Vùng 1: Hà Nội và Tây Bắc';
            case "2":
                return $this->attributes['store_effect'] = "Vùng 2: Duyên Hải và Đông Bắc";
            case "3":
                return $this->attributes['store_effect'] = "Vùng 3: Miền Trung";
            case "4":
                return $this->attributes['store_effect'] = "Vùng 4: Tây Nguyên";
            case "5":
                return $this->attributes['store_effect'] = "Vùng 5: Hồ Chí Minh và miền Đông";
            case "6":
                return $this->attributes['store_effect'] = "Vùng 6: Miền Tây";
            case "7":
                return $this->attributes['store_effect'] = "Online";
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
