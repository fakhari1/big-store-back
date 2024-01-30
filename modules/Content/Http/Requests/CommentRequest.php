<?php

namespace Modules\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->method()) {
            'POST', 'PUT', 'PATCH' => [
                'text' => ['required'],
                'parent_id' => ['nullable', 'exists:comments,id'],
            ],
        };
    }
}
