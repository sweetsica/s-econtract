<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'name' => $request->name
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
        return view('back-end.contract.dashboard', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
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
}