<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'name',
        'abbreviation',
    ];

    /**
     * > The `cities()` function returns all the cities that belong to a country
     * 
     * @return A collection of cities
     */
    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
