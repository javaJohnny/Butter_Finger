<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id','name', 'avatar', 'phonenumber', 'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
