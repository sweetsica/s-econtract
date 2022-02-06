<?php

namespace App\Http\Controllers;

use App\Enum\CommonEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function registerIndex()
    {
        $page_title = 'Đăng ký đại lý';
        $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('auth.signup-partner', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect("login")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['email'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $user->assignRole(Role::findByName(CommonEnum::PARTNER_LEVEL_ONE));

        return $user;
    }

    public function loginIndex()
    {
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('auth.login-partner', compact('page_title', 'page_description', 'action'));
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function listUsers()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $action = __FUNCTION__;

        return view('admin.user-list', compact(['users', 'action']));
    }

    public function editRoleUser(Request $request, $id)
    {
        $user = User::find($id);
        $action = __FUNCTION__;
        $roles = Role::all()->toArray();
        $permissions = Permission::all();
        $userRoleName = $user->getRoleNames()->first();
        $userPermissionsNames = $user->getPermissionNames()->toArray();
        return view('admin.user-detail', compact(['user', 'action', 'roles', 'permissions', 'userRoleName', 'userPermissionsNames']));
    }
    
    public function updateRoleUser(Request $request, $id) {
        $user = User::find($id);
        
        $role = Role::find($request->role);
        $permissions = Permission::whereIn('id',$request->permissions)->get();
        
        $user->syncRoles([$role]);
        $user->syncPermissions($permissions);
        
        return redirect(route('admin.users'));
    }
}
