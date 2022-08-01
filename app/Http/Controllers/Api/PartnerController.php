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
    public function index(Request $request)
    {
        $partners = Partner::all();
        return response()->json($partners, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
//            $validator = Validator::make($request->all(),[
//                'owner_name' =>'required|string|max:255',
//                'account_email'=>'required|string|email|max:255|unique:partners',
//                'account_phone'=>'required|string|max:255|unique:partners',
//            ],[
//                'account_name.required'=>'Tên không được để trống',
//                'account_email.required'=>'Email không được để trống',
//                'account_phone.required'=>'Số điện thoại không được để trống',
//                'account_email.unique'=>'Email đã tồn tại',
//                'account_phone.unique'=>'Số điện thoại đã tồn tại'
//            ]);
//            if($validator->fails()){
//                return response()->json($validator->messages(),400);
//            }
//            Toàn bộ fields t  rường partner bắt buộc, trừ owner_token

            if ($request['contract_mode'] == 0) {
                //Đăng ký nhanh
                echo 'Tạo nhanh';
                $checkPartner = Partner::where('owner_phone', $request->owner_phone)->orWhere('owner_id_numb', $request->owner_id_numb)->first();
                if ($checkPartner) {
                    $data = $checkPartner;
                    $data['notice'] = 'Bạn đã là đối tác!';
                    return response($data, 200);
                } else {
                    //Nếu thông tin partner chưa có
                    $partner = Partner::create($request->only(['owner_name', 'owner_id_numb', 'owner_id_numb_created_at', 'owner_id_numb_created_locate', 'owner_sex', 'owner_dob', 'owner_age', 'owner_token', 'owner_phone', 'owner_email', 'owner_mst']));
                    $contract = Contract::create($request->only(['store_contract_type', 'contract_code', 'store_name', 'store_add_DKKD', 'store_local_DKKD', 'store_add_GH', 'store_local_GH', 'store_headman', 'store_mst', 'member_id', 'store_phone', 'store_website', 'store_GPDKKD', 'store_id_Numb_GPDKKD', 'store_bank', 'store_bank_holder', 'store_bank_numb', 'store_contact_name', 'store_contact_phone', 'store_contact_position', 'store_effect', 'store_started', 'store_end', 'contract_level','contract_mode', 'store_signed', 'store_sign_img', 'store_sign_img_doppelherz', 'store_token']));
                    $contract->contract_mode = $request->contract_mode;
                    $contract->contract_code = 'HD-2022/' . $contract->id . $contract->created_at->format('-His');
                    $contract->partnerId = $partner->id;
                    $contract->save();
                    return response()->json($contract,200);
                }
            } else {
                //Đăng ký đầy đủ
                echo 'Tạo chậm';
                $checkPartner = Partner::where('owner_phone', $request->owner_phone)->orWhere('owner_id_numb', $request->owner_id_numb)->first();
                if ($checkPartner) {
                    echo 'Bạn đã là đối tác!';
                    $partner = Partner::find($checkPartner->id)->update($request->only(['owner_sex','owner_dob','owner_age','owner_id_numb_created_at','owner_id_numb_created_locate','owner_mst']));
//                    $checkPartner = Partner::update($request->only(['owner_sex','owner_dob','owner_age','owner_id_numb_created_at','owner_id_numb_created_locate','owner_mst']));
//                    $partner->save();
                    $contract = Contract::create($request->only(['store_contract_type', 'store_name', 'store_add_DKKD', 'store_local_DKKD', 'store_add_GH', 'store_local_GH', 'store_headman', 'store_mst', 'member_id', 'store_phone', 'store_website', 'store_GPDKKD', 'store_id_Numb_GPDKKD', 'store_bank', 'store_bank_holder', 'store_bank_numb', 'store_contact_name', 'store_contact_phone', 'store_contact_position', 'store_effect', 'store_started', 'store_end', 'contract_level','contract_mode', 'store_signed', 'store_sign_img', 'store_sign_img_doppelherz', 'store_token']));
                    $contract->contract_mode = $request->contract_mode;
                    $contract->contract_code = 'HD-2022/' . $contract->id . $contract->created_at->format('-His');
                    $contract->partnerId = $checkPartner->id;
                    $contract->save();
                    echo 'Thêm hợp đồng và cập nhật đối tác thành công';
                    return response()->json($contract, 200);
                } else {
                    //Nếu thông tin partner chưa có
                    $partner = Partner::create($request->only(['owner_name', 'owner_id_numb', 'owner_id_numb_created_at', 'owner_id_numb_created_locate', 'owner_sex', 'owner_dob', 'owner_age', 'owner_token', 'owner_phone', 'owner_email', 'owner_mst']));
                    $contract = Contract::create($request->only(['store_contract_type', 'store_name', 'store_add_DKKD', 'store_local_DKKD', 'store_add_GH', 'store_local_GH', 'store_headman', 'store_mst', 'member_id', 'store_phone', 'store_website', 'store_GPDKKD', 'store_id_Numb_GPDKKD', 'store_bank', 'store_bank_holder', 'store_bank_numb', 'store_contact_name', 'store_contact_phone', 'store_contact_position', 'store_effect', 'store_started', 'store_end', 'contract_level','contract_mode', 'store_signed', 'store_sign_img', 'store_sign_img_doppelherz', 'store_token']));
                    $contract->contract_mode = $request->contract_mode;
                    $contract->contract_code = 'HD-2022/' . $contract->id . $contract->created_at->format('-His');
                    $contract->partnerId = $partner->id;
                    $contract->save();
                    return response()->json($contract,200);
                }
            }
            return response()->json([
                'notice' => 'Tạo thành công, chúng tôi sẽ liên hệ bạn sớm nhất!',
                'redirect_url' => url('/doi-tac/dang-nhap')
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

    public function partner_check(Request $request)
    {
        $partner = Partner::where('owner_phone', $request->owner_phone)->orWhere('owner_id_numb', $request->owner_id_numb)->first();
        if ($partner) {
            return response()->json(
                [
                    'exist' => true,
                    'redirect_url' => route('partner.login'),
                    'partner' => [
                        'id' => $partner->id,
                        'name' => $partner->owner_name,
                        'gender' => $partner->owner_sex
                    ],
                ], 200);

        } else {
            return response()->json(
                [
                    'exist' => false
                ], 200);
        }
    }

}
