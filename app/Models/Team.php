<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Team extends Pivot
{
    protected $table = 'teams';
    
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'user_id',
        'sector_id',
        'administrator'
    ];

    /**
     * This function returns the sector that this company belongs to.
     * 
     * @return The sector() method returns the sector that the user belongs to.
     */
    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

    /**
     * This function returns the user that belongs to this post.
     * 
     * @return The user() method returns the user that owns the phone.
     */
    public function user()  
    {
        return $this->belongsTo('App\Models\User');
    }
}
