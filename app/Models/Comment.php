<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function request(){
        return $this->belongsTo('App\PrintRequest');
    }
}
