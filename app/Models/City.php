<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'name',
        'state_id'
    ];

    /**
     * The `state()` function returns the state that the city belongs to
     * 
     * @return The state that the city belongs to.
     */
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
