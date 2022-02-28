<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Partner;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
//    public function login(Request $request)
//    {
//        $validator = Validator::make($request->all(),[
//            'email' => 'required|string|max:255',
//            'password' => 'required|min:6'
//        ]);
//
//        if($validator->fails()){
//            dd($validator);
//            return response()->json($validator->errors());
//        }
//        try{
//
//            $info_user = User::where('email', $request->email)->first();
//
//            if($info_user){
//                if(Hash::check($request->password,$info_user->password)){
//                    $id_user = $info_user->id;
//                    $token = $id_user.'|'.User::find($id_user)->tokens()->get('token');
//                    return response()->json($token);
//                }else{
//                    return response()->json('Sai mật khẩu!');
//                }
//            }else{
//                return response()->json('Sai tài khoản');
//            }
//        }catch(\Exception $error)
//        {
//            Log::error($error);
//            return response()->json($error);
//        }
//
//        return response()->json('Add partner successfully');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'username' => 'required|min:6'
            ]);
            $member = Member::create($request->all());

            return response()->json($member);
        }catch (\Exception $exception) {
            return response()->json($exception);
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
        return Member::find($id);
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
        $member = Member::find($id);
        $member->update($request->all());
        return $member;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        return Member::destroy($id);
    }

    /**
     * Search function
     * @param $id
     * @return mixed
     */
    public function search($username)
    {
        return Member::where('username','like','%'.$username.'%')->get();
    }
}
