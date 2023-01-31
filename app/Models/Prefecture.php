<?php

namespace App\Models;

use App\Models\Zoo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'prefecture',
    ];
    
    public function zoos() {
        return $this->hasMany(Zoo::class);
    }
}
