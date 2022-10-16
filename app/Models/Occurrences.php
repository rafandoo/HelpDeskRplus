<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrences extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'date',
        'initial_time',
        'final_time',
        'description',
        'ticket_id',
        'user_id'
    ];

    public $timestamps = false;

    /**
     * This function returns the ticket that this comment belongs to
     * 
     * @return The ticket that is associated with the comment.
     */
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }

    /**
     * > The `user()` function returns the user that owns the post
     * 
     * @return A collection of all the comments that belong to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
