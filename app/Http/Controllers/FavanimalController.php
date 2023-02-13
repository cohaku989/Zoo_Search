<?php

namespace App\Http\Controllers;

use App\Models\Favanimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavanimalController extends Controller
{
    public function store($id, Request $request, Favanimal $favanml){
        $user = Auth::id();
        $where = ['animal_family_id' => $id, 'user_id' => $user];
        $favf = $favanml->where($where)->first();
        
        if($user == $request->user_id){
            if($favf != ""){
                return "same";
            }else{
                $favanml->fill($request->all())->save();
                return 'ok';
            }
        }else {
            return 'failed';
        }
    }
    
    public function destroy($id, Request $request, Favanimal $favanml){
        $user = Auth::id();
        $where = ['animal_family_id' => $id, 'user_id' => $user];
        $favf = $favanml->where($where)->first();
        
        if($user == $request->user_id){
            if($favf != ""){
                $wheres = ['user_id' => $request->user_id, 'animal_family_id' => $request->animal_family_id];
                $favanml->where($wheres)->delete();
                return 'delete';
            }
        }else {
            return 'failed';
        }
    }
}
