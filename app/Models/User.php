<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // == Relations

    public function postings()
    {
        return $this->hasMany(Posting::class);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'other_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'leader_user_id', 'follower_user_id');
    }

    public function leaders()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_user_id', 'leader_user_id');
    }

}
