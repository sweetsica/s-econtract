<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

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

    public function edit($id)
    {
        $info_data = Contract::get()->where('id', '=', $id);
        $page_title = 'Chi tiết hợp đồng';
        $page_description = 'Thông tin chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.edit', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }

    public function update(Request $request)
    {

    }
}
