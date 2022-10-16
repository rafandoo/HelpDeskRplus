<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /* A security feature that prevents mass assignment. */
    protected $fillable = [
        'title',
        'description',
        'closed_at',
        'category_id',
        'priority_id',
        'status_id',
        'sector_id',
        'client_id',
        'user_id',
        'contact'
    ];

    /**
     * The `category()` function returns the category that the product belongs to
     * 
     * @return The category that the post belongs to.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * The `priority()` function returns the `Priority` model that is associated with the `Ticket`
     * model
     * 
     * @return A collection of all the comments associated with the ticket.
     */
    public function priority()
    {
        return $this->belongsTo('App\Models\Priority');
    }

    /**
     * The `status()` function returns the `status` relationship of the `Task` model
     * 
     * @return The status of the task.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * The `sector()` function returns the sector that the user belongs to
     * 
     * @return The sector that the user belongs to.
     */
    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

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
     * > The `user()` function returns the user that owns the post
     * 
     * @return A collection of all the comments that belong to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
    * It creates a relationship between the two models.
    * 
    * @return A collection of all the occurrences associated with the user.
    */
    public function occurrences()
    {
        return $this->hasMany('App\Models\Occurrences');
    }

    /**
     * It creates a relationship between the serviceOrder and the serviceOrderItem model.
     * 
     * @return The serviceOrder model.
     */
    public function serviceOrder()
    {
        return $this->hasOne('App\Models\serviceOrder');
    }
}
