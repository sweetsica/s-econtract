<?php

namespace App\Http\Controllers;

use App\Enum\CommonEnum;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    public function index()
    {
        if(Session::get('member_id')){
            return redirect()->to('/contract/dashboard');
        }else{
            $page_title = 'S-Contract Hợp đồng điện tử';
            $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
            $logo = "images/logo.png";
            $logoText = "images/logo-text.png";
            $action = __FUNCTION__;
            return view('back-end.index', compact('page_title', 'page_description','action','logo','logoText'));
        }
    }
    public function lockpage(Request $request)
    {
            if(Session::get('member_id')){
                return redirect()->to('/contract/dashboard');
            }else{
                $page_title = 'S-Contract Hợp đồng điện tử';
                $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
                $logo = "images/logo.png";
                $logoText = "images/logo-text.png";
                $action = __FUNCTION__;
                try{
                    $member = Member::where('member_code', $request->get('member_code'))->first();
                    if ($member) {
                        if(Hash::check($request->password, $member->password)) {
                            $request->session()->put(['member_id' => $member->id]);
                            Session::forget('error');
                            return redirect()->to('/contract/dashboard');
                        }else{
                            Session::flash('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản và mật khẩu');
                        }
                    }else{
                        Session::flash('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản và mật khẩu');
                    }
                    return view('back-end.index', compact('page_title', 'page_description','action','logo','logoText'));
                }catch (\Exception $e){
                    return redirect()->to('/');
                }

            }

    }
    public function logout(){
        Session::forget('member_id');
        return redirect()->to('/');
    }
    // Sign up Partner
    public function signup_partner()
    {
        $page_title = 'Đăng ký đại lý';
        $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.form.signup-partner', compact('page_title', 'page_description','action','logo','logoText'));
    }

    // Dashboard
    public function dashboard()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $user = Auth::user();
        return view('back-end.dashboard.index', compact('page_title', 'page_description','action','logo','logoText'));
    }

    // Page Login
    public function page_login()
    {
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('back-end.page.login', compact('page_title', 'page_description','action'));
    }
    // Page Signup
//    public function page_signup()
//    {
//        $page_title = 'Đăng ký đối tác';
//        $page_description = 'Some description for the page';
//
//        $action = __FUNCTION__;
//
//        return view('back-end.page.login', compact('page_title', 'page_description','action'));
//    }

    /**
     * Hướng dẫn sử dụng
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index_document()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view ('back-end.document.index_document', compact('page_title', 'page_description','action','logo','logoText'));
    }

}
