<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceOrder extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'value',
        'ticket_id',
        'description'
    ];

    /**
     * This function returns the ticket that this comment belongs to
     * 
     * @return The ticket that is associated with the comment.
     */
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
