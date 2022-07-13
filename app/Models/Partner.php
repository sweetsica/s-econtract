<?php

namespace App\Models;

use App\Enum\InfoDoppelherzEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function setNameDoppelherzAttribute($value)
    {
        switch ($value){
            case "0":
                $this->attributes['name_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone0;
                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition0;
                break;
            case "1":
                $this->attributes['name_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone1;
                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition1;
                break;
            case "2":
                $this->attributes['name_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone2;
                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition2;
                break;
            case "3":
                $this->attributes['name_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone3;
                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition3;
                break;
            case "4":
                $this->attributes['name_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone4;
                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition4;
                break;
            case "5":
                $this->attributes['name_doppelherz'] = InfoDoppelherzEnum::DoppelherzNameZone5;
                $this->attributes['position_doppelherz'] = InfoDoppelherzEnum::DoppelherzNamePosition5;
                break;
            default:
                return $value;
        }
    }
    public function setBankDoppelherzAttribute($value)
    {
        switch ($value){
            case "0":
                $this->attributes['account_doppelherz'] = InfoDoppelherzEnum::DoppelherzVCBBank;
                $this->attributes['number_doppelherz'] = InfoDoppelherzEnum::DoppelherzVCBBankNumb;
                break;
            case "1":
                $this->attributes['account_doppelherz'] = InfoDoppelherzEnum::DoppelherzVPBank;
                $this->attributes['number_doppelherz'] = InfoDoppelherzEnum::DoppelherzVPBankNumb;
                break;
            default:
                return $value;
        }
    }

    public function delivery_location()
    {
        return $this->belongsTo(Local::class,'delivery_location_id','id');
    }
    public function location()
    {
        return $this->belongsTo(Local::class,'location_id','id');
    }
    public function tdv()
    {
        return $this->belongsTo(Member::class,'id_tdv','member_code');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'id_tdv','member_code');
    }
}
