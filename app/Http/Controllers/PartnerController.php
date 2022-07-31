<?php

namespace App\Http\Controllers;

use App\Http\Traits\SignTrait;
use App\Http\Traits\STrait;
use App\Models\Contract;
use App\Models\Member;
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
     * Danh sách partner mới
     */
    public function new_partner(){
        $info_data = Partner::where('contract_mode',0)->get();
        $page_title = 'Contract Dashboard';
        $page_description = 'Đối tác mới';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.partner.new_partner', compact('page_title', 'page_description', 'action', 'logo', 'logoText','info_data'));
    }
    /**
     * Đăng nhập cho partner
     */
    public function partner_login()
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.partner.partner_login', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));

    }

    public function partner_login_submit(Request $request)
    {
        $info_data_partner = Partner::with('contract')->where('owner_phone', $request->partner_info)->orWhere('owner_email', $request->partner_info)->first();
        if ($info_data_partner) {
            Session::put('session_role', 'partner');
            Session::put('session_partner_id', $info_data_partner->id);
            return redirect()->route('partner.dashboard');
        }
        Session::flash('error', 'Vui lòng kiểm tra lại thông tin đăng nhập');
        return redirect(route('partner.login'));
    }


    /**
     * Thông tin dối tác và danh sách hợp đồng
     */


    /**
     * Lưu data từ form
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_name' => 'required|string|max:255',
            'account_email' => 'required|string|email|max:255',
            'account_phone' => 'required|string|max:255',
            'id_number' => 'required',
        ], [
            'account_name.required' => 'Tên không được để trống',
            'account_email.required' => 'Email không được để trống',
            'account_phone.required' => 'Số điện thoại không được để trống',
            'id_number.required' => 'Số chứng minh thư không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        Partner::create([
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
        $info_data = Partner::with('delivery_location', 'location', 'tdv')->get()->where('id', '=', $id);
//        dd($info_data);
        return view('back-end.contract.show', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }

    /**
     * Chỉnh sửa thông tin hợp đồng
     * @param Request $request
     */
    public function edit($id)
    {
        $info_datas = Contract::where('partnerId','=',$id)->get();
        $info_data_parent = Partner::where('id','=',$id)->first();
        $page_title = 'Contract Dashboard';
        $page_description = 'Chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $info_data = Partner::with('contract')->where('id', '=', $id)->get();
        return view('back-end.contract.edit', compact('page_title', 'page_description','info_datas','info_data_parent','action', 'logo', 'logoText'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        $contract = $partner->contract->first();
        $partner->update($request->only(['owner_name', 'owner_id_numb', 'owner_id_numb_created_at', 'owner_id_numb_created_locate', 'owner_sex', 'owner_dob', 'owner_age', 'owner_token', 'owner_phone', 'owner_email', 'owner_mst']));
        return redirect(route('contract.edit', $contract->id));
    }


    /**
     * Trang dashboard hợp đồng
     */
    public function dashboard()
    {
        $partner_id = Session::get('session_partner_id');
        if(!$partner_id){
            return redirect(route('partner.login'));
        }
        $info_data_partner = Partner::with('contract')->find($partner_id);
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.partner.partner_dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data_partner'));

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
        //code check theo hợp đồng của từng đối tượng member
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $info_data = [];
        // member code role là Admin và Super Admin
        $memberAdmin = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1 || 2);
        })->find($member_id);
        $memberManager = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->find($member_id);
        $member = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 4);
        })->find($member_id);
        if ($memberAdmin) {
            $info_data = Partner::latest()->where('type_contract', '=', 1)->get();
        }
        if ($memberManager) {
            foreach ($memberManager->partner as $partner) {
                if ($partner->type_contract == 1) {
                    $info_data[] = $partner;
                }
            }
            foreach ($memberManager->children as $child) {
                foreach ($child->partner as $partner) {
                    if ($partner->type_contract == 1) {
                        $info_data[] = $partner;
                    }
                }
            }
        } else {
            $info_data = $member->partner->where('type_contract', '=', 1);
        }
        $contact_count = count($info_data);
        $user_count = Member::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data', 'contact_count', 'user_count'));
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

        //code check theo hợp đồng của từng đối tượng member
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $info_data = [];
        // member code role là Admin và Super Admin
        $memberAdmin = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1 || 2);
        })->find($member_id);
        $memberManager = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->find($member_id);
        $member = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 4);
        })->find($member_id);
        if ($memberAdmin) {
            $info_data = Partner::latest()->where('type_contract', '=', 2)->get();
        }
        if ($memberManager) {
            foreach ($memberManager->partner as $partner) {
                if ($partner->type_contract == 2) {
                    $info_data[] = $partner;
                }
            }
            foreach ($memberManager->children as $child) {
                foreach ($child->partner as $partner) {
                    if ($partner->type_contract == 2) {
                        $info_data[] = $partner;
                    }
                }
            }
        } else {
            $info_data = $member->partner->where('type_contract', '=', 2);
        }
        $contact_count = count($info_data);
        $user_count = Member::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data', 'contact_count', 'user_count'));
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

        //code check theo hợp đồng của từng đối tượng member
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $info_data = [];
        // member code role là Admin và Super Admin
        $memberAdmin = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1 || 2);
        })->find($member_id);
        $memberManager = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->find($member_id);
        $member = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 4);
        })->find($member_id);
        if ($memberAdmin) {
            $info_data = Partner::latest()->where('type_contract', '=', 3)->get();
        }
        if ($memberManager) {
            foreach ($memberManager->partner as $partner) {
                if ($partner->type_contract == 3) {
                    $info_data[] = $partner;
                }
            }
            foreach ($memberManager->children as $child) {
                foreach ($child->partner as $partner) {
                    if ($partner->type_contract == 3) {
                        $info_data[] = $partner;
                    }
                }
            }
        } else {
            $info_data = $member->partner->where('type_contract', '=', 3);
        }
        $contact_count = count($info_data);
        $user_count = Member::count();
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data', 'contact_count', 'user_count'));
    }

    /**jvxvbrkvbmxcvbkrsdfdskfnvnxvuxv,vabva;;vzxxxxxcnvhfbdjeksdnd
     * Trang sửa level hợp đồng
     */
    public function list()
    {
        $page_title = 'Danh sách hợp đồng';
        $page_description = 'Phân cấp hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $info_data = [];
        // member code role là Admin và Super Admin
        $memberAdmin = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1 || 2);
        })->find($member_id);
        $memberManager = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->find($member_id);
        $member = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 4);
        })->find($member_id);
        if ($memberAdmin) {
            $info_data = Partner::latest()->get();
        }
        if ($memberManager) {
            foreach ($memberManager->partner as $partner) {

                $info_data[] = $partner;

            }
            foreach ($memberManager->children as $child) {
                foreach ($child->partner as $partner) {

                    $info_data[] = $partner;

                }
            }
        } else {
            $info_data = $member->partner;
        }
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }

    public function list_type10()
    {
        $page_title = 'Danh sách hợp đồng';
        $page_description = 'Phân cấp hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $info_data = [];
        // member code role là Admin và Super Admin
        $memberAdmin = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1 || 2);
        })->find($member_id);
        $memberManager = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->find($member_id);
        $member = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 4);
        })->find($member_id);
        if ($memberAdmin) {
            $info_data = Partner::latest()->where('access_type', '=', 10)->get();
        }
        if ($memberManager) {
            foreach ($memberManager->partner->where('access_type', '=', 10) as $partner) {
                $info_data[] = $partner;
            }
            foreach ($memberManager->children as $child) {
                foreach ($child->partner->where('access_type', '=', 10) as $partner) {
                    $info_data[] = $partner;
                }
            }
        } else {
            $info_data = $member->partner->where('access_type', '=', 10);
        }
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }

    public function list_typeall()
    {
        $page_title = 'Danh sách hợp đồng';
        $page_description = 'Phân cấp hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $info_data = [];
        // member code role là Admin và Super Admin
        $memberAdmin = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1 || 2);
        })->find($member_id);
        $memberManager = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->find($member_id);
        $member = Member::with('parent', 'children', 'roles', 'partner')->whereHas('roles', function ($query) {
            return $query->where('role_id', 4);
        })->find($member_id);
        if ($memberAdmin) {
            $info_data = Partner::latest()->where('access_type', '<', 10)->get();
        }
        if ($memberManager) {
            foreach ($memberManager->partner->where('access_type', '<', 10) as $partner) {
                $info_data[] = $partner;
            }
            foreach ($memberManager->children as $child) {
                foreach ($child->partner->where('access_type', '<', 10) as $partner) {
                    $info_data[] = $partner;
                }
            }
        } else {
            $info_data = $member->partner->where('access_type', '<', 10);
        }
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }

    // Dành cho người quản lý muốn xem chi tiết hợp đồng trên pdf
    public function show_partner_pdf($id)
    {
        $partner = Partner::find($id);
        $pdf = PDF::loadView('/pdf_true_export', ["info" => $partner]);
        $time = Carbon::now()->format('d-m-Y');
        $name = 'hop-dong-dien-tu-' . $time;
        return $pdf->stream($name . '.pdf');
    }

    //reset password
    public function reset_password()
    {
        $page_title = 'S-Contract Hợp đồng điện tử';
        $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.reset_password', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    public function checkinfo(Request $request)
    {
        $request->validate([
            'account_phone' => 'required',
            'id_number' => 'required'
        ], [
            'account_phone.required' => 'Vui lòng nhập số điện thoại.',
            'id_number.required' => 'Vui lòng nhập số CMT/CCCD'
        ]);
        try {
            $account_phone = $request->get('account_phone');
            $id_number = $request->get('id_number');
            $partner = Partner::where('account_phone', $account_phone)->where('id_number', $id_number)->first();
            if ($partner) {
                $request->session()->put('partner_reset_password_id', $partner->id);
                Session::flash('success', 'Đã tìm thấy thông tin của bạn, vui lòng nhập mật khẩu mới');
                return redirect()->to('/partner/reset-password');
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function reset_password_save(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'same:password|required'
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu.',
            'confirm_password.same' => 'Mật khẩu không trùng khớp.'
        ]);
        try {
            $id = Session::get('partner_reset_password_id');
            $password = $request->get('password_confirm');
            $partner = Partner::find($id);
            $partner->account_password = Hash::make($password);
            $partner->save();
            Session::forget('partner_reset_password_id');
            Session::flash('success-reset password', 'Đổi mật khẩu thành công');
            return redirect()->to('/contract/search/');
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
