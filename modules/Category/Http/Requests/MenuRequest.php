<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->method()) {
            'POST', 'PUT', 'PATCH' => [
                'title' => ['required'],
                'url' => ['required'],
                'status' => ['required'],
                'parent_id' => ['required'],
            ],
        };

    }
}
