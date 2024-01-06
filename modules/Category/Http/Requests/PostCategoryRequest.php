<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->method()) {
            'POST' => [
                'title' => ['required'],
                'description' => ['required'],
                'tags' => ['required'],
                'status' => ['required', 'numeric', 'in:0,1'],
                'file' => ['required']
            ],
            'PATCH' => [
                'title' => ['required'],
                'description' => ['required'],
                'tags' => ['required'],
                'status' => ['required', 'numeric', 'in:0,1'],
                'file' => ['null']
            ],
            default => [],
        };

    }
}
