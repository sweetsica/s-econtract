<?php

namespace App\Http\Controllers;

use App\Enum\CommonEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class PageController extends Controller
{
    public function lockpage(Request $request)
    {
        if($request->password == 'Doppelherz'){
            return redirect('dashboard');
        }else{
            $page_title = 'S-Contract Hợp đồng điện tử';
            $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
            $logo = "images/logo.png";
            $logoText = "images/logo-text.png";
            $action = __FUNCTION__;
            return view('back-end.index', compact('page_title', 'page_description','action','logo','logoText'));
        }
    }
    public function index()
    {
        $page_title = 'S-Contract Hợp đồng điện tử';
        $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.index', compact('page_title', 'page_description','action','logo','logoText'));
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

        // get current user
        $user = Auth::user();
        // all user role
//        $roles = $user->getRoleNames();

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
}
