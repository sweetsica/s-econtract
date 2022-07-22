<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Http\Traits\STrait;

class ContractController extends Controller
{
    use STrait;

    public function contract_list()
    {
        $info_data = [];
        $check_role = Session::get('session_role');
        if (!$check_role) {
            return redirect('/');
        }
        if ($check_role == 'admin') {
            $info_data = Contract::orderBy('id', 'desc')->get();

        } else {
            return redirect(route('member.contract.list'));
        }
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data', 'check_role'));
    }

    public function edit($contract_id)
    {
        $info_data = Contract::where('id', '=', $contract_id)->first();
        $contract_count = Contract::where('id', '!=', $contract_id)->count();
        $info_data_parent = Partner::with('contract')->get()->where('id', '=', $info_data['partnerId'])->first();
        $page_title = 'Chi tiết hợp đồng';
        $page_description = 'Thông tin chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.show', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data', 'info_data_parent', 'contract_count'));
    }

    public function update(Request $request, $id)
    {
        $contract = Contract::find($id);
        $contract->update($request->only(['store_contract_type', 'contract_code', 'store_name', 'store_add_DKKD', 'store_local_DKKD', 'store_add_GH', 'store_local_GH', 'store_headman', 'store_mst', 'member_id', 'store_phone', 'store_website', 'store_GPDKKD', 'store_id_Numb_GPDKKD', 'store_bank', 'store_bank_holder', 'store_bank_numb', 'store_contact_name', 'store_contact_phone', 'store_contact_position', 'store_effect', 'store_started', 'store_end', 'contract_level', 'store_signed', 'store_sign_img', 'store_sign_img_doppelherz', 'store_token']));
        return redirect()->back();
    }

    public function store(Request $request, $id){
        $partner = Partner::find($id);
        if($partner){
            $contract = Contract::create($request->all());
            $contract->contract_level = 10;
            $contract->partnerId = $partner->id;
            $contract->contract_code = 'HD-2022/'.$contract->id.$contract->created_at->format('-His');
            $partner->contract_mode = 1;
            $partner->save();
            $contract->save();
        }
        return redirect()->back();
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

    public function search_export_data(Request $request)
    {
        try {
            $data = Contract::with('partner', 'doppelherz', 'local_dkkd', 'local_gh')->where('contract_code', $request['contract_title'])->orWhere('store_phone', $request['contract_title'])->first();
            if ($data['store_signed'] == 0) {
                Session::put('id_contract', $data['id']);
                return view('back-end.signature.signature');
            } else {
                $pdf = $this->show_contract($data);
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
            $data = Contract::with('partner', 'doppelherz', 'local_dkkd', 'local_gh')->Where('id', '=', $id_contract)->get()->last();
            $pdf = $this->show_contract($data);
            $time = Carbon::now()->format('d-m-Y');
            $name = 'hop-dong-dien-tu-' . $time;
            return $pdf->stream($name . '.pdf');
        } catch (\Exception $exception) {
            return redirect()->to('/404');
        }
    }

    // Dành cho người quản lý muốn xem chi tiết hợp đồng trên pdf
    public function show_contract_pdf(Request $request, $id)
    {
        $contract = Contract::find($id);
        $type = $request->get('type');
        if ($type == 'only_show') {
            $pdf = $this->show_contract($contract);
            $time = Carbon::now()->format('d-m-Y');
            $name = 'hop-dong-dien-tu-' . $time;
            return $pdf->stream($name . '.pdf');
        } else {
            if ($contract['store_signed'] == 0) {
                Session::put('id_contract', $contract['id']);
                return view('back-end.signature.signature');
            } else {
                $pdf = $this->show_contract($contract);
                $time = Carbon::now()->format('d-m-Y');
                $name = 'hop-dong-dien-tu-' . $time;
                return $pdf->stream($name . '.pdf');
            }
        }
    }
}
