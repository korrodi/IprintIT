<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    /**
     * Get the requests for the Printer.
     */
    public function printRequest()
    {
        return $this->hasMany('App\PrintRequest');
    }
}
