<?php

namespace Modules\RolePermission\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return response()->json([
            'data' => [
                'permissions' => $permissions
            ]
        ]);
    }
}
