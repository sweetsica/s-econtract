<?php

namespace App\Http\Controllers;

use App\Http\Traits\SignTrait;
use App\Models\Partner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class PartnerController extends Controller
{
    use SignTrait;
    /**
     * Lưu data từ form
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $request->validate([
//            ''
//        ]);
//
//        $partner = Partner::create($request->all());
//        return redirect(route('dashboard'));
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
            return response()->json($validator->errors());
        }

        $partner = Partner::create([
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
        $info_data = Partner::with('delivery_location','location')->get()->where('id','=',$id);
//        dd($info_data);
        return view('back-end.contract.show', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data'));
    }
    /**
     * Chỉnh sửa thông tin hợp đồng
     * @param Request $request
     */
    public function edit($id)
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::get()->where('id','=',$id);
        return view('back-end.contract.edit',compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data'));
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
        $info_data = Partner::latest()->get();
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
        $info_data = Partner::latest()->where('type_contract','=',1)->get();
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
        $info_data = Partner::latest()->where('type_contract','=',2)->get();
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
        $info_data = Partner::latest()->where('type_contract','=',3)->get();
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
        $info_data = Partner::get();
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data'));
    }
    public function list_type10()
    {
        $page_title = 'Danh sách hợp đồng';
        $page_description = 'Phân cấp hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::get()->where('access_type','=',10);
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data'));
    }
    public function list_typeall()
    {
        $page_title = 'Danh sách hợp đồng';
        $page_description = 'Phân cấp hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;$info_data = Partner::get()->where('access_type','<',10);
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data'));
    }

    /**
     * Tìm kiếm hợp đồng form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search_export()
    {
        $page_title = 'S-Contract Hợp đồng điện tử';
        $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.search_export', compact('page_title', 'page_description','action','logo','logoText'));
    }


    public function search_export_with_data(Request $request)
    {
        try {
            $phone = $request['account_phone'];
            $password = $request['account_password'];
            $data = Partner::Where('account_phone',$phone)->get()->last();
            if($data) {
                if (Hash::check($password,$data->account_password)) {
                    if($data['signed'] == 0){
                        Session::put('id_partner',$data['id']);
                        return view('back-end.signature.signature');
                    }else{
                        $pdf = PDF::loadView('/pdf_true_export', ["info"=>$data]);
                        $time = Carbon::now()->format('d-m-Y');
                        $name = 'hop-dong-dien-tu-'.$time;
                        return $pdf->stream($name.'.pdf');
                    }
                } else {
                    Session::flash('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản và mật khẩu');
                    return redirect()->back();
                }
            }else{
                Session::flash('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản và mật khẩu');
                return redirect()->back();
            }

        }catch (\Exception $exception) {
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
            $id_partner = Session::get('id_partner');
            $data['info'] = Partner::Where('id','=',$id_partner)->get()->last();
            $pdf = PDF::loadView('pdf_true_export', $data);
            $time = Carbon::now()->format('d-m-Y');
            $name = 'hop-dong-dien-tu-'.$time;
            return $pdf->stream($name.'.pdf');
        }catch (\Exception $exception) {
            dd($exception);
        }
    }
}
