<?php

namespace Modules\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->method()) {
            'POST', 'PUT', 'PATCH' => [
                'question' => ['required'],
                'answer' => ['required'],
                'status' => ['required'],
                'tags' => ['required'],
            ],
        };
    }
}
