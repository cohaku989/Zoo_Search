<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use App\Models\Zoo;
use App\Models\Animal_family;
use App\Models\Animal_order;
use App\Models\Animal_class;
use App\Models\Favzoo;
use App\Models\Favanimal;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZooController extends Controller
{
    public function archive(Zoo $zoo)
    {
        $zoo = Auth::user()->zoos;
        return view('zoos/archive')->with(['zoo' => $zoo]);
    }

 
    public function show(Zoo $zoo)
    {
        $prevurl = url()->previous();
        $user = Auth::user();
        if($user){
             $ani_rels = Animal_class::with(['animal_orders' => function($query){
                $query->with(['animal_families']); 
            }])->get();
            $where = ['user_id'=> $user->id, 'zoo_id' => $zoo->id];
            $favz = Favzoo::where($where)->first();
            return view('zoos/show')
            ->with([
                'zoo' => $zoo, 
                'user' => $user, 
                'favz' => $favz, 
                'animals' => $ani_rels, 
                'prevurl' => $prevurl
                ]);
        }else {
            $ani_rels = Animal_class::with(['animal_orders' => function($query){
                $query->with(['animal_families']); 
            }])->get();
            return view('zoos/show')
            ->with([
                'zoo' => $zoo, 
                'animals' => $ani_rels, 
                'prevurl' => $prevurl
                ]);
        }
    }
    
    public function create(Zoo $zoo) 
    {
        $prefectures = Prefecture::all();
        $ani_rels = Animal_class::with(['animal_orders' => function($query){
            $query->with(['animal_families']); 
        }])->get();
        return view('zoos/create')->with(['zoo' => $zoo, 'ani_rels' => $ani_rels, 'prefectures' => $prefectures]);
    }
    
    public function store(Request $request, Zoo $zoo)
    {
        $input = $request['zoo'];
        
        $zoo->fill($input)->save();
        
        if($request->animal_family){
            $zoo->animal_families()->detach();
            $zoo->animal_families()->attach($request->animal_family);
        }
        
        return redirect('/zoos/' . $zoo->id);
    }
    
    public function edit(Zoo $zoo) 
    {
        $prefectures = Prefecture::all();
        $ani_rels = Animal_class::with(['animal_orders' => function($query){
            $query->with(['animal_families']); 
        }])->get();
        
        $checked = $zoo->animal_families()->get();
        
        return view('zoos/edit')->with(['zoo'=>$zoo, 'ani_rels' => $ani_rels, 'prefectures' => $prefectures, 'checked' => $checked]);
    }
    
    public function update(Request $request, Zoo $zoo)
    {
        $input = $request['zoo'];
        
        $zoo->fill($input)->save();
        
        if($request->animal_family){
            $zoo->animal_families()->sync($request->get('animal_family', []));
        }
        
        return redirect('/zoos/' . $zoo->id);
    }
    
    public function delete(Zoo $zoo)
    {
        $zoo->delete();
        return redirect('/zoos');
    }
    
    public function each_zoo($id, Animal_family $anmlf, Zoo $zoo)
    {
        $prevurl = url()->previous();
        $user = Auth::user();
        if($user){
            $where = ['user_id'=> $user->id, 'animal_family_id' => $id];
            $fava = Favanimal::where($where)->first();
            $anmlf = Animal_family::with('zoos')->get();
            return view('zoos/each')
            ->with([
                'anmlfs' => $anmlf, 
                'id' => $id, 
                'fava' => $fava,
                'user' => $user,
                'prevurl' => $prevurl
            ]);
        }else {
            $anmlf = Animal_family::with('zoos')->get();
             return view('zoos/each')
            ->with([
                'anmlfs' => $anmlf, 
                'id' => $id,
                'prevurl' => $prevurl
            ]);
        }
    }
}
