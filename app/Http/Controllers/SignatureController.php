<?php

namespace App\Http\Controllers;

use App\Http\Traits\SignTrait;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_partner = Session::get('id_partner');
        $partner = Partner::where('id', '=', $id_partner)->first();
        $partner['code_contract'] = $partner['id'] . '-' . $partner['created_at']->format('dmY') . "/2022/HĐĐL";
        $url_image = $this->save_sign($request, sprintf("%s-%s", $partner['id'], $partner["account_phone"]));
        //$urlImage
        $partner['image'] = $url_image;
        $partner['image'] = Session::get('url_true');
        $partner['name_doppelherz'] = $request['name_doppelherz'];
        $partner['bank_doppelherz'] = $request['bank_doppelherz'];
        $doppelherz_image = DoppelherzSign::where('name', '=', $partner['name_doppelherz'])->get('image')->first();
        $partner['doppelherz_image'] = $doppelherz_image['image'];
        $partner['signed'] = true;
        $partner->save();
        return redirect()->route('contract.return.export-sign');
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
