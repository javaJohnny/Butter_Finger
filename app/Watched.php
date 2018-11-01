<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Watched extends Model
{
    protected $fillable =[
        'movie_id', 'user_id', 'checked'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
