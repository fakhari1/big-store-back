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
        if ($this->isMethod('POST')) {
            return [
                'category_name' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
                'category_tags' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
                'category_status' => 'required|numeric|in:0,1',
                'image' => 'required|mimes:jpg,jpeg,png,gif',
                'category_description' => 'required|string|max:255'
            ];
        } else {
            return [
                'category_name' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
                'category_tags' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
                'category_status' => 'required|numeric|in:0,1',
                'image' => 'mimes:jpg,jpeg,png,gif',
                'category_description' => 'required|string|max:255'
            ];
        }
    }

    public function attributes()
    {
        return [
            'category_name' => 'نام دسته بندی',
            'category_description' => 'توضیحات',
            'category_image' => 'تصویر',
            'category_status' => 'وضعیت',
            'category_tags' => 'تگ ها'
        ];
    }

}
