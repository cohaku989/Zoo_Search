<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function archive(Admin $admin)
    {
        $admin = Auth::user();
        return view('admin/profile/archive')->with(['admin' => $admin]);
    }
    
    public function edit($link, Admin $admin) 
    {
        $admin = Auth::user();
        return view('admin/profile/edit')->with(['admin'=> $admin, 'link' => $link]);
    }
    
    public function update(Request $request, Admin $admin)
    {
        $admin = Auth::user();
        if( $request->input("name")){
            $admin->name = $request->name;
        }elseif($request->input("email")){
            $admin->email = $request->email;
        }
        $admin->save();
        return redirect('/admin/profile');
    }
}
