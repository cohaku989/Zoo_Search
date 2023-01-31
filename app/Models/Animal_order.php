<?php

namespace App\Models;

use App\Models\Zoo;
use App\Models\Animal_class;
use App\Models\Animal_family;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_order extends Model
{
    use HasFactory;
    
    public function zoos() {
        return $this->belongsToMany(Zoo::class);
    }
    
    public function animal_class() {
        return $this->belongsTo(Animal_class::class);
    }
    
    public function animal_families() {
        return $this->hasMany(Animal_family::class);
    }
    
}
