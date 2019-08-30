<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationFile extends Model
{
    protected $fillable = [
        'uuid', 'file_name', 'file_path', 'application_id', 'uploader',
    ];

    public function application()
    {
        return $this->belongsTo('App\Models\Application');
    }
}
