<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    // public function requiredBy()
    // {
    //     return $this->belongsTo('App\Model\User');
    // }
}
