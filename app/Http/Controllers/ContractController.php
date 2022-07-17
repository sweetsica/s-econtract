<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ContractController extends Controller
{
    public function contract_list()
    {
        $info_data = Contract::orderBy('id', 'desc')->paginate('10');
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }

    public function edit($contract_id)
    {
        $info_data = Contract::where('id', '=', $contract_id)->first();
        $info_data_parent = Partner::get()->where('id','=',$info_data['partnerId'])->first();
        $page_title = 'Chi tiết hợp đồng';
        $page_description = 'Thông tin chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.edit', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data','info_data_parent'));
    }

    public function update(Request $request)
    {
        dd($request);
        $partner = Partner::update($request->only(['owner_name','owner_id_numb','owner_id_numb_created_at','owner_id_numb_created_locate','owner_sex','owner_dob','owner_age','owner_token','owner_phone','owner_email','owner_mst']));
        $contact = Contract::update($request->only(['partnerID'=>$partner->id,'store_contract_type','contract_code','store_name','store_add_DKKD','store_local_DKKD','store_add_GH','store_local_GH','store_phone','store_website','store_GPDKKD','store_id_Numb_GPDKKD','store_bank','store_bank_holder','store_bank_numb','store_contact_name','store_contact_phone','store_contact_position','store_effect','store_started','store_end','contract_level','store_signed','store_sign_img','store_sign_img_doppelherz','store_token']));
        $partner->save();
        $contact->partnerId = $partner->id;
        $contact->contract_code = 'HD-2022/'.$contact->id.$contact->created_at->format('-His');
        $contact->save();
    }

    /**
     * Tìm kiếm hợp đồng form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search_export()
    {
        $page_title = 'Tìm kiếm hợp đồng';
        $page_description = 'Tìm kiếm hợp đồng - vui lòng nhập mã hợp đồng, mật khẩu';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.search_export', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    /*
     *
     */
    public function search_export_data(Request $request)
    {
        try {
            $data = Contract::where('contract_code', $request['contract_title'])->orWhere('store_phone', $request['contract_title'])->get()->last();
            if($data['store_signed']==0){
                Session::put('id_contract', $data['id']);
                return view('back-end.signature.signature');
            }else{
                $pdf = PDF::loadView('/pdf_true_export', ["info" => $data]);
                $time = Carbon::now()->format('d-m-Y');
                $name = 'hop-dong-dien-tu-' . $time;
                return $pdf->stream($name . '.pdf');
            }

        } catch (\Exception $exception) {
            return redirect()->to('/404');
        }
    }

    /**
     *  Trả kết quả tìm kiếm sau khi thêm chữ ký
     * @param Request $request
     * @return mixed
     */
    public function return_export_after_sign()
    {
        try {
            $id_contract = Session::get('id_contract');
            $data['info'] = Contract::Where('id', '=', $id_contract)->get()->last();
            $pdf = PDF::loadView('pdf_true_export', $data);
            $time = Carbon::now()->format('d-m-Y');
            $name = 'hop-dong-dien-tu-' . $time;
            return $pdf->stream($name . '.pdf');
        } catch (\Exception $exception) {
            return redirect()->to('/404');
        }
    }

    // Dành cho người quản lý muốn xem chi tiết hợp đồng trên pdf
    public function show_partner_pdf($id){
        $contract = Contract::find($id);
        $pdf = PDF::loadView('/pdf_true_export', ["info" => $contract]);
        $time = Carbon::now()->format('d-m-Y');
        $name = 'hop-dong-dien-tu-' . $time;
        return $pdf->stream($name . '.pdf');
    }
}
