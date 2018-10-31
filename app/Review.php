<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Review extends Model
{

    protected $fillable = ['user_id', 'movie_id', 'name', 'review', 'attachment', 'media'];

    protected $primarykey = 'user_id';
    protected $dates = [
    'created_at',
    'updated_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
