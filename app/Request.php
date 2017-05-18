<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * Get the User that sended the Request.
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
    /**
     * Get the User that closed the Request.
     */
    public function closer()
    {
        return $this->belongsTo('App\User', 'closed_user_id');
    }
    /**
     * Get the Printer that owns the Request.
     */
    public function printer()
    {
        return $this->belongsTo('App\Printer', 'printer_id');
    }
    /**
     * Get the comments for the Request.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
