<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role_index(){
        $page_title = 'Vai trò & Phân quyền';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $roles = Role::all();
        return view('back-end.role.index', compact('page_title',
            'page_description', 'action', 'logo', 'logoText','roles'));
    }
    public function role_create(Request $request){
        try{
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
            ]);
            Role::create($request->all());
            return redirect()->to('/role');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function role_edit($id){
        $role = Role::find($id);
        return view('back-end.role.edit', compact('role'));
    }
    public function role_update(Request $request, $id){
        try{
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
            ]);
            $role = Role::find($id);
            $role->update($request->all());
            return redirect()->to('/role');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function role_delete($id){
        try{
            $role = Role::find($id);
            $role->delete();
            return redirect()->to('/role');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
