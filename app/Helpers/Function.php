<?php

use App\Models\Member;
use Illuminate\Support\Facades\Session;
if(!function_exists('memberRole')){
    function memberRole(){
        if(Session::has('user_check')){
          return  Session::get('user_check');
        }
        return null;
    }
}
if(!function_exists('checkRoleSupperAdmin')){
    function checkRoleSupperAdmin(){
        $member_id = null;
        if (Session::has('member_id')) {
            $member_id = Session::get('member_id');
        }
        $memberAdmin = Member::with('roles')->whereHas('roles', function ($query) {
            return $query->where('role_id', 1);
        })->find($member_id);
        if(!empty($memberAdmin)){
            return true;
        }
        return false;
    }
}
if(!function_exists('memberRecursive')){
function memberRecursive($members, $parent_id = 0, $sub = true)
    {
        $member_child = array();
        foreach ($members as $key => $item) {
            if ($item['parent_id'] == $parent_id ) {
                $member_child[] = $item;
                unset($members[$key]);
            }
        }
        if ($member_child) {
            echo $sub ? '' : '<ul class="nested">';
            foreach ($member_child as $item) {
                echo ' <li >';
                echo '<a class="caret" href="#">' . $item['member_name'] . '</a>';
                memberRecursive($members, $item['id'], false);
                echo '</li>';
            }
            echo $sub ? '' :"</ul>";
        }
    }
}
if (!function_exists('memberSelect')) {
    function memberSelect($members, $parent_id = 0, $char = '', $selected = 0)
    {
        foreach ($members as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id   ) {
                if ($selected !== 0 && $item->id == $selected) {
                    echo '<option selected value="' . $item->id . '">' . $char . $item->member_name . ' </option>';
                } else {
                    echo '<option value="' . $item->id . '">' . $char . $item->member_name . ' </option>';
                }
                unset($members[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                memberSelect($members, $item->id, $char . '|--');
            }
        }
    }
}

if(!function_exists('format_date')){
    function format_date($date, $format = 'd/m/Y'){
        if(!empty($date)){
            return date($format, strtotime($date));
        }
        return '';
    }
}
