<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Department;
use App\Models\Local;
use App\Models\Member;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function member_list()
    {
        $page_title = 'Danh sách thành viên';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $members = Member::latest()->with('location')->get();
        return view('back-end.member.list', compact('page_title',
            'page_description', 'action', 'logo', 'logoText', 'members'));
    }

    public function member_create()
    {
        $page_title = 'Tạo nhân viên';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $local = Local::where('parent_id', 0)->get();
        $roles = Role::all();
        $departments = Department::all();
        $memberWithRoleManager = Member::with('roles')->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->get();
        return view('back-end.member.create', compact('page_title',
            'page_description', 'action', 'logo', 'logoText', 'local', 'roles', 'departments', 'memberWithRoleManager'));
    }

    public function member_store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'member_name' => 'required|max:255',
            'member_code' => 'required|max:255|unique:members',
            'email' => 'required|email|max:255|unique:members',
            'phone' => 'required|max:255|unique:members',
            'password' => 'required|min:6',
            'location_id' => 'required',
            'address' => 'required',
        ], [
            'member_name.required' => 'Tên nhân viên không được để trống',
            'member_code.required' => 'Mã nhân viên không được để trống',
            'member_code.unique' => 'Mã nhân viên đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'location_id.required' => 'Vui lòng chọn địa điểm',
            'roles.required' => 'Vui lòng chọn quyền',
            'departments.required' => 'Vui lòng chọn phòng ban',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ]);
        try {
            $member = Member::create([
                'member_name' => $request->get('member_name'),
                'member_code' => $request->get('member_code'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => bcrypt($request->get('password')),
                'location_id' => $request->get('location_id'),
                'address' => $request->get('address'),
                'parent_id' => $request->get('parent_id'),
            ]);
            $member->roles()->attach($request->get('roles'));
            $member->department()->attach($request->get('departments'));
            DB::commit();
            return redirect(route('member.list'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function member_edit($id)
    {
        $page_title = 'Sửa nhân viên';
        $page_description = 'Danh sách hợp đồng cấp 1';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        $local = Local::where('parent_id', 0)->get();
        $roles = Role::all();
        $departments = Department::all();
        $memberWithRoleManager = Member::with('roles')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1);
        })->get();
        $member = Member::find($id);
        $managers = Member::with('roles','department')->whereHas('department',function ($query) use ($member) {
            $query->whereIn('department_id',$member->department->pluck('id')->toArray());
        })->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->get();
        $districts = Local::where('parent_id',$member->location->parent->parent->code)->get();
        $wards = Local::where('parent_id',$member->location->parent->code)->get();

        return view('back-end.member.edit', compact('page_title',
            'page_description', 'action', 'logo', 'logoText', 'local', 'roles', 'departments', 'memberWithRoleManager', 'member', 'districts', 'wards', 'managers'));
    }

    public function member_update(Request $request, $id)
    {
        DB::beginTransaction();
        $request->validate([
            'member_name' => 'required|max:255',
            'member_code' => ['required','max:255', Rule::unique('members')->ignore($id)],
            'email' =>['required','max:255', Rule::unique('members')->ignore($id)],
            'phone' =>['required','max:255', Rule::unique('members')->ignore($id)],
            'location_id' => 'required',
            'address' => 'required',
        ], [
            'member_name.required' => 'Tên nhân viên không được để trống',
            'member_code.required' => 'Mã nhân viên không được để trống',
            'member_code.unique' => 'Mã nhân viên đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'location_id.required' => 'Vui lòng chọn địa điểm',
            'roles.required' => 'Vui lòng chọn quyền',
            'departments.required' => 'Vui lòng chọn phòng ban',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ]);
        try {
            $member = Member::find($id);
            if($request->get('password')){
                $password = bcrypt($request->get('password'));
            }else{
                $password = $member->password;
            }
            $member->update([
                'member_name' => $request->get('member_name'),
                'member_code' => $request->get('member_code'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => $password,
                'location_id' => $request->get('location_id'),
                'address' => $request->get('address'),
                'parent_id' => $request->get('parent_id'),
            ]);
            $member->roles()->sync($request->get('roles'));
            $member->department()->sync($request->get('departments'));
            DB::commit();
            return redirect(route('member.list'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function member_delete($id)
    {
        try {
            $member = Member::find($id);
            $member->delete();
            return redirect(route('member.list'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public  function get_manager(Request $request)
    {
        $manager = Member::with('roles','department')->whereHas('department',function ($query) use ($request) {
            $query->whereIn('department_id',$request->get('department_id'));
        })->whereHas('roles', function ($query) {
            return $query->where('role_id', 3);
        })->get();
        return response()->json($manager);
    }

    public function member_contract_list(){
        $check_role = Session::get('session_role');
        $member_id = Session::get('session_id');
        $member = Member::with('contract')->find($member_id);
        $info_data = $member->contract;
        $page_title = 'Contract Dashboard';
        $page_description = 'Danh sách hợp đồng của bạn';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data','check_role'));
    }

    public function team_contract_list(){
        $check_role = Session::get('session_role');
        if ($check_role == 'captain') {
            $member = Member::with('contract','children')->find(Auth::id());
            $info_data = $member->children;
        }else{
            return redirect(route('contract.list'));
        }
        $page_title = 'Contract Dashboard';
        $page_description = 'Hợp đồng của thành viên';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.contract.team_list', compact('page_title', 'page_description', 'action', 'logo', 'logoText', 'info_data'));
    }
}
