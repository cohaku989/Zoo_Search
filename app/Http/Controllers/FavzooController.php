<?php

namespace App\Http\Controllers;

use App\Models\Favzoo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavzooController extends Controller
{
    public function store($id, Request $request, Favzoo $favzoo){
        $user = Auth::id();
        $where =['zoo_id' => $id, 'user_id' => $user];
        $favf = $favzoo->where($where)->first();
        
        if($user == $request->user_id){
            if($favf != ""){
                return "same";
            }else{
                $favzoo->fill($request->all())->save();
                return 'ok';
            }
        }else {
            return 'failed';
        }
    }
    
    public function destroy($id, Request $request, Favzoo $favzoo){
        $user = Auth::id();
        $where =['zoo_id' => $id, 'user_id' => $user];
        $favf = $favzoo->where($where)->first();
        
        if($user == $request->user_id){
            if($favf != ""){
                $wheres = ['user_id' => $request->user_id, 'zoo_id' => $request->zoo_id];
                $favzoo->where($wheres)->delete();
                return 'delete';
            }
        }else {
            return 'failed';
        }
    }
}
