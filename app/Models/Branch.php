<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'BranchId', 'BranchName'
    ];

    protected $primaryKey = 'BranchId';

    public function users()
    {
        return $this->hasMany('App\Models\User', 'branch_id');
    }
}
