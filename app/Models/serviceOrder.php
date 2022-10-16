<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'ticket_id',
        'description'
    ];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
