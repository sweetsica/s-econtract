<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function getLocal(Request $request){
        $local = Local::with('parent', 'children')->search($request)->get();
        return response()->json([
           "local"=> $local
        ]);
    }
}
