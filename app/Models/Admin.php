<?php

namespace App\Models;

use App\Models\AdminProfile;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $permissions;
    public $assignedRoles = [];

    protected $fillable = [
        'userName',
        'email',
        'password',
        'rule',
        'status',
        'last_login_at',
        'last_login_ip',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function edit(array $arr) {
        foreach ($arr as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function isActive()
    {
        return $this->status == 1;
    }

    public function hasPermission($permission)
    {
        return $this->permissions && in_array($permission, $this->permissions);
    }

    public function profile()
    {
        return $this->hasOne(AdminProfile::class, 'user_id', 'id');
    }

    public function getFullName()
    {
        return $this->profile->first_name . ' ' . $this->profile->last_name . ' [ ' . $this->userName . ' ]';
    }

    public function hasRole($role)
    {
        return $this->roles->contains('id', $role);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getAdminRoles()
    {
        return $this->roles()->where('guard_name', 'admin')->get();
    }

    public static function currentUser()
    {
        return Auth::user()->id;
    }

}
