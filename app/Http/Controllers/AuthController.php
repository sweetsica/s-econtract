<?php

namespace App\Http\Controllers;

use App\Enum\CommonEnum;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    #1
    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string|min:3',
                'email' => 'required|unique:users,email',
                'password' => 'confirmed'
            ]);
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password'])
            ]);
            $token = $user->createToken('sweettoken')->accessToken;
            return response()->json([
                'user' => [
                    "id" => $user->id,
                    "name" => $user->name,
                    "email" => $user->email
                ],
                'token' => $token
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function index()
    {
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('back-end.index', compact('page_title', 'page_description', 'action'));
    }

    public function login_form(){
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('back-end.auth.login_form', compact('page_title', 'page_description', 'action'));
    }

    #2
    public function login(Request $request)
    {
        $checkuser = User::where('email', $request->username)->first();
        if ($checkuser) {
            Session::put('session_role', 'admin');
            Session::put('session_id', $checkuser->id);
            Session::put('session_name', $checkuser->name);
            $page_title = 'Trang quản trị';
            $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
            $logo = "images/logo.png";
            $logoText = "images/logo-text.png";
            $action = __FUNCTION__;
//            return redirect()->route('dashboard')->with(compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
            return view('back-end.dashboard.index', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
        } else {
            $checkmember = Member::where('member_code', $request->username)->first();
            if ($checkmember) {
                Session::put('session_role', 'member');
                Session::put('session_id', $checkmember->id);
                Session::put('session_name', $checkmember->member_name);
                $checkCap = Member::with('roles')->where('member_code', $request->username)->whereHas('roles', function ($query) {
                    return $query->where('role_id', 1)->orWhere('role_id', 3);
                })->first();
                if ($checkCap) {
                    Session::put('session_role', 'captain');
                }
                Auth::loginUsingId($checkmember->id);
                $page_title = 'Danh sách hợp đồng';
                $page_description = 'Đăng ký đại lý Doppelherz Việt Nam';
                $logo = "images/logo.png";
                $logoText = "images/logo-text.png";
                $action = __FUNCTION__;
                return view('back-end.dashboard.index', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
            } else {
                Session::flash('error', 'Vui lòng kiểm tra lại thông tin đăng nhập');
                return redirect()->back();
            }
        }
    }

    #3
    public function logout(Request $request)
    {
        $checkRole = Session::get('session_role');
        if ($checkRole !== 'partner') {
            return redirect('/');
        }
        return redirect()->route('partner.login');
//        auth()->user()->tokens()->delete();
//        return [
//            'message' => 'Đã thoát, token vô hiệu!'
//        ];
    }

    public function getUserInfo(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }

    #4
    public function getuser()
    {
        return User::all();
    }

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

    public function updateRoleUser(Request $request, $id)
    {
        $user = User::find($id);
        $role = Role::find($request->role);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $user->syncRoles([$role]);
        $user->syncPermissions($permissions);
        return redirect(route('admin.users'));
    }


    public function member_login_form()
    {
        $page_title = 'Contract Dashboard';
        $page_description = 'Chi tiết hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.auth.login_form', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    //login cho user và admin
    public function member_login(Request $request)
    {
        $admin = User::where('email', $request->get('username'))->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                Session::put("user_check", [
                    'role' => "ADMIN",
                    'user_id' => $admin->id
                ]);
                dd("Hello ADMIN");
                Session::forget('error');
                return redirect()->to('/contract/dashboard');
            } else {
                Session::flash('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản và mật khẩu');
            }
        } else {
            $member = Member::where('member_code', $request->get('username'))->first();
            if ($member) {
                if (Hash::check($request->password, $member->password)) {
                    Session::put("user_check", [
                        'role' => "MEMBER",
                        'user_id' => $admin->id
                    ]);
                    Session::forget('error');
                    dd("Hello Member");
                    return redirect()->to('/contract/dashboard');
                } else {
                    Session::flash('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản và mật khẩu');
                }
            }
        }
    }

    public function logoutMember()
    {
        Session::forget('user_check');
        return redirect()->to('/');
    }
}
