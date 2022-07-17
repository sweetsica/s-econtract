<?php

namespace App\Http\Controllers;

use App\Http\Traits\SignTrait;
use App\Models\Contract;
use App\Models\DoppelherzSign;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SignatureController extends Controller
{
    use SignTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.signature.signature');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try{
            $id_contract = Session::get('id_contract');
            $contract = Contract::where('id', '=', $id_contract)->first();
            $url_image = $this->save_sign($request, sprintf("%s-%s", $contract['id'], $contract["account_phone"]));
            $contract['store_sign_img'] = $url_image;
            $contract['store_sign_img'] = Session::get('url_true');
            $contract['name_doppelherz'] = $request['name_doppelherz'];
            $contract['bank_doppelherz'] = $request['bank_doppelherz'];
            $doppelherz_image = DoppelherzSign::where('name', '=', $contract['store_sign_img_doppelherz'])->get()->first();
            $contract['store_sign_img_doppelherz'] = $doppelherz_image['id'];
            $contract['store_signed'] = true;
            $contract->save();
            return redirect()->route('contract.return.export.signed');
        }catch (\Exception $e){
            return redirect()->route('contract.return.export.signed');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
