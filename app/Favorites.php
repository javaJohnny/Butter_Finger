<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Favorites extends Model
{
    protected $fillable =[
        'movie_id', 'user_id', 'checked'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favoritedByUser(){
        $userId = auth()->id();
        $favorite = $this->checked->first(function($v)use($userId){
            return $v->user_id == $user_id;
        });

        if($favorite){
            return true;
        }
        return false;
    }
}
