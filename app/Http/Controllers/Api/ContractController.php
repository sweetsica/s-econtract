<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Partner;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    //
    public function create(Request $request){
        $partner = Partner::where('owner_phone',$request->owner_phone)->orWhere('owner_id_numb',$request->owner_phone)->first();
        if($partner){
            $contract = Contract::create($request->only(
                'store_name',
                'store_add_DKKD',
                'store_local_DKKD',
                'store_add_GH',
                'store_local_GH',
                'store_headman',
                'store_mst',
                'store_phone',
                'store_website',
                'store_GPDKKD',
                'store_id_Numb_GPDKKD',
                'store_bank',
                'store_bank_holder',
                'store_bank_numb',
                'store_contact_name',
                'store_contact_phone',
                'store_contact_position',
                'store_effect',
                'store_started',
                'store_end',
                'member_id',
                'store_token'
            ));
            $contract->partnerId = $partner->id;
            $contract->contract_code = 'HD-2022/' . $contract->id . $contract->created_at->format('-His');
            $contract->save();
            return response()->json([
                "message"=>"Tạo hợp đồng cho đối tác thành công",
                "contract"=>$contract
            ],200);
        }else{
            return response()->json([
                "message"=>"Không tồn tại đối tác này"
            ],400);
        }
    }
}
