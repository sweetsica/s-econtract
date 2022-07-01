<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Local;
use App\Models\Member;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department_system(){
        $page_title = 'Danh sách phòng ban';
        $page_description = 'Danh sách phòng ban';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $departments = Department::with('members')->get();
        $members = Member::with('location')->get();
        return view('back-end.department_system.index', compact('page_title',
            'page_description', 'action', 'logo', 'logoText','departments', 'members'));
    }
    public function department_list()
    {
        $page_title = 'Phòng ban';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $departments = Department::with('location')->get();
        return view('back-end.department.list', compact('page_title',
            'page_description', 'action', 'logo', 'logoText','departments'));
    }

    public function department_create()
    {
        $page_title = 'Tạo Phòng ban';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $local = Local::where('parent_id',0)->get();
        return view('back-end.department.create', compact('page_title',
            'page_description', 'action', 'logo', 'logoText','local'));
    }
    public function department_store(Request $request){
        try{
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'location_id' => 'required',
            ]);
            Department::create($request->all());
            return redirect()->to('/department');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function department_edit($id){
        $page_title = 'Sửa Phòng ban';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $department = Department::find($id);
        $local = Local::where('parent_id',0)->get();
        $districts = Local::where('parent_id',$department->location->parent->parent->code)->get();
        $wards = Local::where('parent_id',$department->location->parent->code)->get();
        return view('back-end.department.edit', compact('page_title',
            'page_description', 'action', 'logo', 'logoText','department','local','districts','wards'));
    }
    public function department_update(Request $request, $id){
        try{
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'location_id' => 'required',
            ]);
            $department = Department::find($id);
            $department->update($request->all());
            return redirect()->to('/department');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function department_delete($id){
        try{
            $department = Department::find($id);
            $department->delete();
            return redirect()->to('/department');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
