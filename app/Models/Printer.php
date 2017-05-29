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
