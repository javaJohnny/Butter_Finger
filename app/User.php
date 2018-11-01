<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Review;
use App\Profile;
use App\Favorites;
use App\Watched;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function watched()
    {
        return $this->hasMany(Watched::class);
    }

}
