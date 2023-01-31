<?php

namespace App\Models;

use App\Models\Animal_order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_class extends Model
{
    use HasFactory;
    
    public function animal_orders() {
        return $this->hasMany(Animal_order::class);
    }
}
