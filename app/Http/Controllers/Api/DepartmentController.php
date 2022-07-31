<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function get_department()
    {
        $data = Department::all();
        return response()->json($data);
    }

    public function create_department(Request $request)
    {
        $data = Department::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'location_id'=>$request['location_id']
        ]);
        return response()->json($data);
    }

    public function department_system(Request $request)
    {
        $data = Department::latest()->with('members')->get();
        return response()->json($data);
    }
}
