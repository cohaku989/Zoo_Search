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
        $senior = 'seniors_price';
        $adult = 'adults_price';
        $hsstudent = 'hsstudents_price';
        $jhsstudent = 'jhsstudents_price';
        $esstudent = 'esstudents_price';
        $children = 'children_price';
        
        $seniors2thou = Zoo::where($senior, '>=', 2000)->get();
        $seniorsthou = Zoo::whereBetween($senior, [1000, 1999])->get();
        $seniors5hund = Zoo::whereBetween($senior, [500, 999])->get();
        $seniorsfree = Zoo::where($senior, '<', 500)->get();

        $adults2thou = Zoo::where($adult, '>=', 2000)->get();
        $adultsthou = Zoo::whereBetween($adult, [1000, 1999])->get();
        $adults5hund = Zoo::whereBetween($adult, [500, 999])->get();
        $adultsfree = Zoo::where($adult, '<', 500)->get();
        
        $hsstudents2thou = Zoo::where($hsstudent, '>=', 2000)->get();
        $hsstudentsthou = Zoo::whereBetween($hsstudent, [1000, 1999])->get();
        $hsstudents5hund = Zoo::whereBetween($hsstudent, [500, 999])->get();
        $hsstudentsfree = Zoo::where($hsstudent, '<', 500)->get();
        
        $jhsstudents2thou = Zoo::where($jhsstudent, '>=', 2000)->get();
        $jhsstudentsthou = Zoo::whereBetween($jhsstudent, [1000, 1999])->get();
        $jhsstudents5hund = Zoo::whereBetween($jhsstudent, [500, 999])->get();
        $jhsstudentsfree = Zoo::where($jhsstudent, '<', 500)->get();
        
        $esstudents2thou = Zoo::where($esstudent, '>=', 2000)->get();
        $esstudentsthou = Zoo::whereBetween($esstudent, [1000, 1999])->get();
        $esstudents5hund = Zoo::whereBetween($esstudent, [500, 999])->get();
        $esstudentsfree = Zoo::where($esstudent, '<', 500)->get();
        
        $children2thou = Zoo::where($children, '>=', 2000)->get();
        $childrenthou = Zoo::whereBetween($children, [1000, 1999])->get();
        $children5hund = Zoo::whereBetween($children, [500, 999])->get();
        $childrenfree = Zoo::where($children, '<', 500)->get();
        
        return view('top.top_price')
        ->with([
            'zoos' => $zoo,
            'ss2tho' => $seniors2thou,
            'sstho' => $seniorsthou,
            'ss5hun' => $seniors5hund,
            'ssfree' => $seniorsfree,
            'as2tho' => $adults2thou,
            'astho' => $adultsthou,
            'as5hun' => $adults5hund,
            'asfree' => $adultsfree,
            'hs2tho' => $hsstudents2thou,
            'hstho' => $hsstudentsthou,
            'hs5hun' => $hsstudents5hund,
            'hsfree' => $hsstudentsfree,
            'js2tho' => $jhsstudents2thou,
            'jstho' => $jhsstudentsthou,
            'js5hun' => $jhsstudents5hund,
            'jsfree' => $jhsstudentsfree,
            'es2tho' => $esstudents2thou,
            'estho' => $esstudentsthou,
            'es5hun' => $esstudents5hund,
            'esfree' => $esstudentsfree,
            'cr2tho' => $children2thou,
            'crtho' => $childrenthou,
            'cr5hun' => $children5hund,
            'crfree' => $childrenfree,
            ]);
    }
    
}
