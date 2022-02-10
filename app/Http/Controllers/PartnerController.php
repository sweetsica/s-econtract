<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class PartnerController extends Controller
{
    public function store(Request $request)
    {
//        $request->validate([
//            ''
//        ]);
//
//        $partner = Partner::create($request->all());
//        return redirect(route('dashboard'));
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $partner = Partner::create([
//            'name' => $request->name
            $request->all()
        ]);
        return redirect(route('dashboard'));
    }

    /**
     * Chi tiết hợp đồng
     */
    public function show($id)
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.show', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    /**
     * Trang dashboard hợp đồng
     */
    public function dashboard()
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::paginate(10);
        $contact_count = Partner::count();
        $user_count = User::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data','contact_count','user_count'));
    }
    /**
     * Trang dashboard hợp đồng 1
     */
    public function dashboard1()
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::get()->where('type_contract','=',1);
        $contact_count = Partner::count();
        $user_count = User::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data','contact_count','user_count'));
    }
    /**
     * Trang dashboard hợp đồng 2
     */
    public function dashboard2()
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::get()->where('type_contract','=',2);
        $contact_count = Partner::count();
        $user_count = User::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data','contact_count','user_count'));
    }
    /**
     * Trang dashboard hợp đồng 3
     */
    public function dashboard3()
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::get()->where('type_contract','=',3);
        $contact_count = Partner::count();
        $user_count = User::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data','contact_count','user_count'));
    }

    /**
     * Trang sửa level hợp đồng
     */
    public function list()
    {
        $page_title = 'Danh sách hợp đồng';
        $page_description = 'Phân cấp hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }


    public function search_export()
    {
        $page_title = 'S-Contract Hợp đồng điện tử';
        $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.search_export', compact('page_title', 'page_description','action','logo','logoText'));
    }

    public function return_export(Request $request)
    {
        $phone = $request['account_phone'];
        $data['info'] = Partner::Where('account_phone','=',$phone)->first();
        $pdf = PDF::loadView('pdf_true_export', $data);
        $time = Carbon::now()->format('d-m-Y');
        $name = 'hop-dong-dien-tu'.$time;
        return $pdf->stream($name.'.pdf');
    }
}
