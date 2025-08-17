<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_AGENT = 'ROLE_AGENT';
    public const ROLE_AGENT_ADMIN = 'ROLE_AGENT_ADMIN';

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

    public function isAdmin(){
        return $this->role == 'ROLE_ADMIN';
    }

    public function isAgent(){
        return $this->role == 'ROLE_AGENT' || $this->role == self::ROLE_AGENT_ADMIN;
    }

    public function isAgentAdmin(){
        return $this->role == self::ROLE_AGENT_ADMIN;
    }
}
