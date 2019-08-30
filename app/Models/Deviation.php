<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deviation extends Model
{
    public function applications()
    {
        return $this->belongsToMany('App\Models\Application');
    }
}
