<?php

namespace App\Http\Middleware;

use App\Models\Member;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateCustom
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('user_check')){
            $memberCheck = Session::get('user_check');
            $member = Member::find($memberCheck->user_id);
            if (!$member) {
                return redirect()->to('/');
            }
        }
        return $next($request);
    }
}
