<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        try{
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
            $partner = Partner::create($request->only(['owner_name','owner_idNumb','owner_idNumbCreAt','owner_idNumbCreLocate','owner_sex','owner_dob','owner_age','owner_token','owner_phone','owner_email','owner_mst']));
            $partner->save();
            Contract::create($request->only(['partnerID'=>$partner->id,'contract_code','store_name','store_addDKKD','store_localDKKD','store_addGH','store_localGH','store_phone','store_website','store_GPDKKD','store_idNumbGPDKKD','store_bank','store_bankHolder','store_bankNumb','store_contactName','store_contactPhone','store_contactPosition','store_effect','store_started','store_end','store_signed','store_signImg','store_signImgDoppelherz','store_token']));

            return response()->json([
                'notice' => 'Tạo thành công, chúng tôi sẽ liên hệ bạn sớm nhất!',
                'redirect_url'=>url('/contract/search'),
                'data' => [
                    'id'=>$partner->id,
                    'fullName' => $partner->account_name,
                    'email' => $partner->account_email,
                    'phone' => $partner->account_phone,
                ]
            ],200);
        }catch (\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
