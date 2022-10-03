<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SectorUser extends Pivot
{
    protected $table = 'sector_user';
    protected $fillable = [
        'sector_id',
        'user_id',
        'Administrator'
    ];

    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}