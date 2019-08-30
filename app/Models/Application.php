<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function submitedBy()
    {
        return $this->belongsTo('App\Models\User', 'submited_by', 'id');
    }

    public function submitedTo()
    {
        return $this->belongsTo('App\Models\User', 'submited_to', 'id');
    }

    public function attachment()
    {
        return $this->hasMany('App\Models\ApplicationFile');
    }

    public function deviations()
    {
        return $this->belongsToMany('App\Models\Deviation');
    }
}
