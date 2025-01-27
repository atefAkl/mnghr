<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;
use Spatie\Permission\Contracts\Role as RoleContract;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\RefreshesPermissionCache;

class Role extends ModelsRole implements RoleContract
{
    //
    use HasPermissions;
    use RefreshesPermissionCache;

    protected $guarded = [];
    public $timestamps = true;

    protected $table = "roles";

    protected $casts = [
        'guard_name' => 'string',
    ];

    protected $fillable = [
        'label', 'brief', 'roleNameAr', 'roleNameEn', 'guard_name', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

}
