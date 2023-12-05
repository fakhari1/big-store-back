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
        if ($this->isMethod('POST')) {
            return [
                'title' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
                'summary' => 'required|string|min:2|max:400',
                'category_id' => 'required|numeric|regex:/^[0-9]/u|exists:post_categories,id',
                'image' => 'required|mimes:jpg,jpeg,png,gif',
                'status' => 'required|numeric|in:0,1',
                'body' => 'required|string|min:2|max:25000',
                'commentability' => 'required|numeric|in:0,1',
                'published_at' => 'required|numeric',
                'tags' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
            ];
        }

        if ($this->isMethod('PATCH') or $this->isMethod('PUT')) {
            return [
                'title' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
                'summary' => 'required|string|min:2|max:400',
                'category_id' => 'required|numeric|regex:/^[0-9]/u|exists:post_categories,id',
                'image' => 'mimes:jpg,jpeg,png,gif',
                'status' => 'required|numeric|in:0,1',
                'body' => 'required|string|min:2|max:25000',
                'commentability' => 'required|numeric|in:0,1',
                'published_at' => 'required|numeric',
                'tags' => 'required|string|min:2|regex:' . '/[آ-يa-zA-Z0-9ا-ی]/u',
            ];
        }
    }
}
