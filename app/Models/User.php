<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Zoo;
use App\Models\Favzoo;
use App\Models\Favanimal;
use App\Models\Like;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    public $timestamps = false;
        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    public function zoos() {
        return $this->belongsToMany(Zoo::class);
    }
    
    public function favzoos() {
        return $this->hasMany(Favzoo::class);
    }
    
    public function favanimals() {
        return $this->hasMany(Favanimal::class);
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }
    
}
