<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use App\Models\Zoo;
use App\Models\Animal_family;
use App\Models\Animal_class;
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
        return view('zoos/show')
        ->with(['zoo' => $zoo]);
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
}
