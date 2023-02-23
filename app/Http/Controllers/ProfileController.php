<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zoo;
use App\Models\Favzoo;
use App\Models\Favanimal;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function archive(User $user)
    {
        $user = Auth::user();
        return view('user/profile/archive')->with(['user' => $user]);
    }
    
    public function edit($link, User $user) 
    {
        $user = Auth::user();
        return view('user/profile/edit')->with(['user'=> $user, 'link' => $link]);
    }
    
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        if( $request->input("name")){
            $user->name = $request->name;
        }elseif($request->input("email")){
            $user->email = $request->email;
        }
        $user->save();
        return redirect('/myprofile');
    }
    
    public function favzoo(Favzoo $favzs)
    {
        $favzs = Favzoo::where('user_id', Auth::id())->with(['zoo'])->get();
        
        return view('user/profile/favzoo')->with(['favzs' => $favzs]);
    }
    
    public function favanimal()
    {
        $favas = Favanimal::where('user_id', Auth::id())->with(['animal_family'])->get();
        // dd($favz);
        return view('user/profile/favanimal')->with(['favas' => $favas]);
    }
}
