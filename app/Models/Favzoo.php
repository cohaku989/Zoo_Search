<?php

namespace App\Models;

use App\Models\User;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favzoo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'zoo_id',
        'user_id',
    ];
    
    public $timestamps = false;
    
    public function zoo() {
        return $this->belongsTo(Zoo::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
