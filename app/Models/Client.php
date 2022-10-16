<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'name',
        'fantasy_name',
        'cpf_cnpj',
        'email',
        'phone',
        'notes',
        'active',
        'user_id'
    ];

    /**
     * > This function returns a relationship between the user and the address model
     * 
     * @return The address() method returns a relationship object.
     */
    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    /**
     * > The `user()` function returns the user that owns the post
     * 
     * @return A user object
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
}
