<?php

namespace Modules\RolePermission\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\RolePermission\Http\Requests\RolePermissionRequest;
use Modules\RolePermission\Models\Permission;
use Modules\RolePermission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::with('permissions')->get();

        return Responder::response([
            'roles' => $roles
        ]);
    }

    public function show(Role $role)
    {
        return Responder::response([
            'role' => $role->load('permissions'),
            'permissions' => Permission::all(),
        ]);
    }

    public function store()
    {

    }

    public function update(RolePermissionRequest $request, Role $role)
    {
        $role->update(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function destroy(Role $role)
    {

    }

}
