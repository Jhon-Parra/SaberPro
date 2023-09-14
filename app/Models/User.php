<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use \Illuminate\Notifications\Notifiable;
    use HasFactory;
    use HasRoles;
    public function guardName(){
        return "web";
    }
    use HasApiTokens, HasFactory, Notifiable;


    protected $rememberTokenTTL = 20160;

    public function getRememberTokenExpiration()
    {
        return $this->created_at->addMinutes($this->rememberTokenDuration);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'code',
        'document',
        'phone',
        'points',
        'faculty',
        'state',
        'level',
        'password',
        'remember_token',
        'email_verified_at',
    ];

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
        'password' => 'hashed',
    ];

    public function adminlte_image(){
        return 'http://picsum.photos/300/300';
    }

    public function adminlte_desc(){
        return "Aminstrador";
    }

    public function adminlte_profile_url()
    {
        return'profile/username';
    }


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }



}
