<?php

use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\Role;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\Permission;
use App\Models\AdminRolePermission;
use App\Models\Menu;
use App\Models\RolePermission;


function getUserName($id)
{
	$profile = AdminProfile::where('user_id', $id)->first();
	return $profile->first_name . ' ' . $profile->last_name;
}
function currentUserId(): int|null
{
	return auth()->user() == null ? null : auth()->user()->id;
}
