<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'active'
    ];

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->using('App\Models\Team')
            ->withPivot('administrator');
    }
}
