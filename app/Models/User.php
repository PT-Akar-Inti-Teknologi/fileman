<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name', 'email', 'role_id', 'vendor_id', 'api_token', 'password_temp', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }

    public function isAdmin()
    {
        return $this->role()->where('slug', 'admin')->exists();
    }

    public function isManager()
    {
        return $this->role()->where('slug', 'branch-manager')->exists();
    }

    public function isOfficer()
    {
        return $this->role()->whereIn('slug', ['marketing-officer', 'user-external'])->exists();
    }

    public function applications()
    {
        return $this->hasMany('App\Models\Application', 'submited_by', 'id');
    }

}
