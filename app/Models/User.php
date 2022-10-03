<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'last_name',
        'email',
        'login',
        'password',
        'access_level',
        'status'
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

    public function accessLevel()
    {
        return $this->belongsTo('App\Models\AccessLevel');
    }

    public function client()
    {
        return $this->hasOne('App\Models\Client');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function occurrences()
    {
        return $this->hasMany('App\Models\Occurrence');
    }

    public function sectors()
    {
        return $this->belongsToMany('App\Models\Sector')->using('App\Models\SectorUser');
    }
}
