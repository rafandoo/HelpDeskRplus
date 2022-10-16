<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'description',
        'active'
    ];

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
     * > This function returns a collection of users that belong to this team
     * 
     * @return A collection of users that belong to the team.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->using('App\Models\Team')
            ->withPivot('administrator');
    }
}
