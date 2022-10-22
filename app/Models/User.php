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

    /**
     * > This function returns the access level of the user
     * 
     * @return The access level of the user.
     */
    public function accessLevel()
    {
        return $this->belongsTo('App\Models\AccessLevel');
    }

    /**
     * > This function returns a relationship between the User model and the Client model
     * 
     * @return A single Client model instance.
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client');
    }

    /**
     * > This function returns all the tickets that belong to this user
     * 
     * @return A collection of tickets
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    /**
     * > This function returns all the occurrences that belong to this user
     * 
     * @return A collection of Occurrence objects.
     */
    public function occurrences()
    {
        return $this->hasMany('App\Models\Occurrence');
    }

    /**
     * > This function returns a collection of sectors that the team belongs to
     * 
     * @return A collection of sectors that the team belongs to.
     */
    public function sectors()
    {
        return $this->belongsToMany('App\Models\Sector')
            ->using('App\Models\Team')
            ->withPivot('administrator');
    }

    public function toDos()
    {
        return $this->hasMany(ToDo::class);
    }
}
