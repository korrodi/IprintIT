<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the User that owns the Comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    /**
     * Get the Request that owns the Comment.
     */
    public function request()
    {
        return $this->belongsTo('App\Request', 'request_id');
    }
    /**
     * Get the child Comment that owns the Comment.
     */
    public function parent()
    {
        return $this->belongsTo('Comment', 'parent_id');
    }
    /**
     * Get the child Comment that owns the Comment.
     */
    public function children()
    {
        return $this->hasMany('Comment', 'parent_id');
    }
    /**
     * Get the child Comment that owns the Comment.
     */
    /*public function comment()
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }*/
}
