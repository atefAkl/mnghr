<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\RefreshesPermissionCache;

class Permission extends ModelsPermission implements PermissionContract
{
    //
    use HasRoles;
    use RefreshesPermissionCache;


    public $timestamps = true;
    protected $table = "permissions";
    protected $fillable = [
        "name", 
        "arabic_name",
        "English_name",
        "guard_name",
        "description",
        "created_at",
        "updated_at",
        "deleted_at",
        "created_by",
        "updated_by"
    ];
}
