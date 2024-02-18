<?php

namespace Modules\RolePermission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT', 'PATCH' => [
                'name' => ['required'],
                'permissions' => ['required'],
                'permissions.*' => ['required', 'exists:permissions,id']
            ],
            default => [],
        };
    }
}
