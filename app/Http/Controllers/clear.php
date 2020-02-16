<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clear extends Controller
{
    public function index(Request $request){
        $request->session()->flush();
        return redirect()->back();
    }

    public function cek(Request $request){
        return $request->session()->all();
    }
}
