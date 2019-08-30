<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table = "activity_log";

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    // public function hasAccess(array $permissions) : bool
    // {
    //     foreach ($permissions as $permission) {
    //         if ($this->hasPermission($permission))
    //             return true;
    //     }
    //     return false;
    // }

    // private function hasPermission(string $permission) : bool
    // {
    //     return $this->permissions[$permission] ?? false;
    // }
}
