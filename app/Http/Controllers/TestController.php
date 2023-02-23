<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function verify(){
        return view('account/change-password');
    }
}
