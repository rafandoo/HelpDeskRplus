<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fantasy_name',
        'cpf_cnpj',
        'email',
        'phone',
        'notes',
        'active',
        'user_id'
    ];

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
