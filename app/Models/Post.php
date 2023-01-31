<?php

namespace App\Models;

use App\Models\User;
use App\Models\Zoo;
use App\Models\Animal_family;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'body',
        'zoo_id',
        'animal_family_id',
    ];
    
    public $timestamps = false;
    
    public function zoo() {
        return $this->belongsTo(Zoo::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function animal_family() {
        return $this->belongsTo(Animal_family::class);
    }
    
    protected static function boot()
    {
        parent::boot();
     
        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = \Auth::id();
        });
    }
}
