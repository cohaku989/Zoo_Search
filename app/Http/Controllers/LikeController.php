<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($id, Request $request, Like $like){
        $user = Auth::id();
        $where = ['post_id' => $id, 'user_id' => $user];
        $likef = $like->where($where)->first();
        
        if($user == $request->user_id){
            if($likef != ""){
                return "same";
            }else{
                $like->fill($request->all())->save();
                $num = $like->where('post_id', $id)->count();
                return $num;
            }
        }else {
            return 'failed';
        }
    }
    
    public function destroy($id, Request $request, Like $like){
        $user = Auth::id();
        $where = ['post_id' => $id, 'user_id' => $user];
        $likef = $like->where($where)->first();
        
        if($user == $request->user_id){
            if($likef != ""){
                $wheres = ['user_id' => $request->user_id, 'post_id' => $request->post_id];
                $like->where($wheres)->delete();
                
                $num = $like->where('post_id', $id)->count();
                return $num;
            }
        }else {
            return 'failed';
        }
    }
}
