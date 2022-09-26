<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
