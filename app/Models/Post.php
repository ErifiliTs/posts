<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];
    
    public function likedBy(User $user){
        // collection method
        return $this->likes->contains('user_id', $user->id);
    }
    
    // access the user who posted each post
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
