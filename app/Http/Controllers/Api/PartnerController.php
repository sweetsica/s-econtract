<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            $validator = Validator::make($request->all(),[
                'account_name' =>'required|string|max:255',
                'account_email'=>'required|string|email|max:255',
                'account_phone'=>'required|string|max:255',
            ],[
                'account_name.required'=>'Tên không được để trống',
                'account_email.required'=>'Email không được để trống',
                'account_phone.required'=>'Số điện thoại không được để trống'
            ]);
            if($validator->fails()){
                return response()->json([
                    'error'=>$validator->errors()
                ],400);
            }
            $partner = Partner::create(
                $request->all()
            );
            $partner->update([
                'account_password'=>bcrypt($request->get('account_password'))
            ]);
            return response()->json([
                'notice' => 'Add partner successfully',
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
