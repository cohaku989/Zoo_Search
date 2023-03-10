<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'post_id',
        'user_id',
    ];
    
    public $timestamps = false;
    
    public function post() {
        return $this->belongsTo(Post::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
