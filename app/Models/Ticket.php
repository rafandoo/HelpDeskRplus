<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'opened_at',
        'updated_at',
        'closed_at',
        'category_id',
        'priority_id',
        'status_id',
        'sector_id',
        'client_id',
        'user_id',
        'contact'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function priority()
    {
        return $this->belongsTo('App\Models\Priority');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }   

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
