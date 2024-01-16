<?php

namespace Modules\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'summary' => ['required'],
                'category_id' => ['required'],
                'file' => ['required', 'file'],
                'status' => ['required'],
                'text' => ['required'],
                'comment_ability' => ['required'],
                'published_at' => ['required'],
                'tags' => ['required'],
            ],
            'PUT', 'PATCH' => [
                'title' => ['required'],
                'summary' => ['required'],
                'category_id' => ['required'],
                'file' => ['nullable', 'file'],
                'status' => ['required'],
                'text' => ['required'],
                'comment_ability' => ['required'],
                'published_at' => ['required'],
                'tags' => ['required'],
            ]
        };
    }
}
