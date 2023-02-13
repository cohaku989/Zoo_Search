<?php

namespace App\Http\Controllers;

use App\Models\Zoo;
use App\Models\Animal_class;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function show_place(Zoo $zoo) {
        $zoo = $zoo->get();
        return view('top.top_place')->with(['zoos' => $zoo]);
    }
    
    public function show_animals(Zoo $zoo) {
        $animal_rel = Animal_class::with(['animal_orders' => function($query){
            $query->with(['animal_families']);
        }])->get();
        
        return view('top.top_animals')->with(['zoo' => $zoo, 'animal_rel' => $animal_rel]);
    }
    
    public function show_price(Zoo $zoo) {
        $zoo = $zoo->get();
        return view('top.top_price')->with(['zoos' => $zoo]);
    }
    
}
