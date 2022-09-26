<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrences extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'initial_time',
        'final_time',
        'description',
        'ticket_id',
        'user_id'
    ];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
