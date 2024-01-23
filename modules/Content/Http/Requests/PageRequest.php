<?php

namespace Modules\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->method()) {
            'POST', 'PUT', 'PATCH' => [
                'fa_title' => ['required'],
                'en_title' => ['required'],
                'status' => ['required'],
                'text' => ['required'],
                'tags' => ['required']
            ],
        };
    }
}
