<?php

namespace Modules\RolePermission\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
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

    public function create() {

    }

    public function store() {

    }

    public function update(Role $role) {

    }

    public function destroy(Role $role)
    {

    }

}
