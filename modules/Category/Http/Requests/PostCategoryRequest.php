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
        switch ($this->method) {
            case 'POST':
                return [
                    'title' => ['required'],
                    'description' => ['required'],
                    'tags' => ['required'],
                    'status' => ['required'],
                    'file' => ['required']
                ];
                break;
            case 'PATCH':
                return [
                    'title' => ['required'],
                    'description' => ['required'],
                    'tags' => ['required'],
                    'status' => ['required'],
                    'file' => ['required']
                ];
                break;

            default:
                [];
        }

    }

    public function attributes()
    {

    }

}
