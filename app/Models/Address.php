<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /* A list of fields that can be filled by the user. */
    protected $fillable = [
        'client_id',
        'street',
        'number',
        'complement',
        'neighborhood',
        'zip_code',
        'city_id'
    ];
    
    /**
     * > This function returns the client that is associated with the invoice
     * 
     * @return The client that is associated with the invoice.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * The city() function returns the city that the user belongs to
     * 
     * @return The city that the user belongs to.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
