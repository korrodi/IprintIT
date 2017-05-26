<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintRequest extends Model
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


    protected $table = 'requests';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'description', 'quantity', 'colored', 'stapled', 'paper_size', 'paper_type', 'file', 'due_date'
    ];
    public function resumeText($type, $limit)
    {
        $summary = $this->$type;

        if (strlen($summary) > $limit) {
          $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
          return $summary;
        }

        return $summary;
    }
    public function getStatus() 
    {
        return ($this->status == 1)? 'Processado' : 'Processamento';
    }
}