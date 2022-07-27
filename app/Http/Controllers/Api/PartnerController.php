<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return response()->json($partners,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        if ($request->partnerId) {
            $contract = Contract::create($request->only(['store_contract_type', 'contract_code', 'store_name', 'store_add_DKKD', 'store_local_DKKD', 'store_add_GH', 'store_local_GH', 'store_headman', 'store_mst', 'member_id', 'store_phone', 'store_website', 'store_GPDKKD', 'store_id_Numb_GPDKKD', 'store_bank', 'store_bank_holder', 'store_bank_numb', 'store_contact_name', 'store_contact_phone', 'store_contact_position', 'store_effect', 'store_started', 'store_end', 'contract_level', 'store_signed', 'store_sign_img', 'store_sign_img_doppelherz', 'store_token']));
            $contract->contract_code = 'HD-2022/' . $contract->id . $contract->created_at->format('-His');
            $contract->partnerId = $request->partnerId;
            $contract->save();
            return response()->json('Thêm hợp đồng thành công! Chúng tôi sẽ liên hệ bạn sớm nhất.',200);
        } elseif (isset($request->contract_mode)) {
            if ($request->contract_mode == 1) {
                $partner = Partner::create($request->only(['owner_name', 'owner_id_numb', 'owner_id_numb_created_at', 'owner_id_numb_created_locate', 'owner_sex', 'owner_dob', 'owner_age', 'owner_token', 'owner_phone', 'owner_email', 'owner_mst', 'contract_mode']));
                $partner->save();
                $contract = Contract::create($request->only(['store_contract_type', 'contract_code', 'store_name', 'store_add_DKKD', 'store_local_DKKD', 'store_add_GH', 'store_local_GH', 'store_headman', 'store_mst', 'member_id', 'store_phone', 'store_website', 'store_GPDKKD', 'store_id_Numb_GPDKKD', 'store_bank', 'store_bank_holder', 'store_bank_numb', 'store_contact_name', 'store_contact_phone', 'store_contact_position', 'store_effect', 'store_started', 'store_end', 'contract_level', 'store_signed', 'store_sign_img', 'store_sign_img_doppelherz', 'store_token']));
                $contract->contract_code = 'HD-2022/' . $contract->id . $contract->created_at->format('-His');
                $contract->partnerId = $partner['id'];
                $contract->save();
                return response()->json('Thêm đối tác có nhiều hợp đồng thành công!',200);
            } else {
//                Partner::create($request->all());
                Partner::create($request->only(['owner_name', 'owner_id_numb', 'owner_id_numb_created_at', 'owner_id_numb_created_locate', 'owner_sex', 'owner_dob', 'owner_age', 'owner_token', 'owner_phone', 'owner_email', 'owner_mst', 'contract_mode']));
                return response()->json('Thêm đối tác thành công!',200);
            }
        } else {
            return response()->json('Truy vấn lỗi!',400);
        }
    }

    public function partner_check(Request $request){
        $partner = Partner::where('owner_phone',$request->owner_phone)->orWhere('owner_id_numb',$request->owner_id_numb)->first();
        if($partner){
            return response()->json(
                [
                    'exist'=>true,
                    'redirect_url'=>route('partner.login'),
                    'partner'=>[
                        'id'=>$partner->id,
                        'name'=>$partner->owner_name,
                        'gender'=>$partner->owner_sex
                    ],
                ],200);

        }else{
            return response()->json(
                [
                    'exist'=>false
                ],200);
        }
    }

}
