<?php

namespace App\Models;

use App\Models\User;
use App\Models\Animal_family;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favanimal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'animal_family_id',
        'user_id',
    ];
    
    public $timestamps = false;
    
    public function animal_family() {
        return $this->belongsTo(Animal_family::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
