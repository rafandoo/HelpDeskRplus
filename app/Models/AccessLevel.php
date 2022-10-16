<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'name'
    ];

    /**
     * > The `users()` function returns all the users that belong to the current role
     * 
     * @return A collection of users.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
