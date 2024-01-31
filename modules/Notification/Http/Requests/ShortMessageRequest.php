<?php

namespace Modules\Notification\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortMessageRequest extends FormRequest
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
                'text' => ['required'],
                'published_at' => ['required'],
                'status' => ['required'],
            ],
        };
    }
}
