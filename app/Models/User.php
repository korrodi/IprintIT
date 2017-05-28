<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;
    /**
     * Get the requests for the User.
     */
    public function requests()
    {
        return $this->hasMany('App\Request');
    }
    /**
     * Get the comments for the User.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the Department that owns the User.
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'department_id', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if ($this->admin === 1) {
            return true;
        }
        return false;
    }
    public function isActive()
    {
        if ($this->activated === 1) {
            return true;
        }
        return false;
    }
    public function isBlocked()
    {
        if ($this->blocked === 0) {
            return true;
        }
        return false;
    }
    public function resumeText($limit)
    {
        $summary = $this->presentation;

        if (strlen($summary) > $limit) {
          $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
          return $summary;
        }

        return $summary;
    }
    public function getName()
    {
        $pieces = explode(" ", $this->name);
        if (count($pieces) > 1) {
            return $pieces[0] . ' ' . $pieces[count($pieces)-1];
        }else {
            return $this->name;
        }
    }
}
