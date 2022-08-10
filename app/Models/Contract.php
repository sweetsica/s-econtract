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

    public function setStoreContractTypeAttribute($value){
        switch ($value){
            case "1":
                $this->attributes['store_contract_type'] = "Hợp đồng chính sách mới";
                break;
            case "2":
                $this->attributes['store_contract_type'] = "Hợp đồng du lịch Nhật Bản";
                break;
            case "3":
                $this->attributes['store_contract_type'] = "Hợp đồng du lịch Đức";
                break;
            default:
                return $value;
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
