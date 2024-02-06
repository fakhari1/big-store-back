<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return match ($this->method()) {
            'POST', 'PUT', 'PATCH' => [
                'title' => ['required'],
                'description' => ['required'],
                'keywords' => ['required'],
                'logo' => ['required'],
                'icon' => ['required'],
                'landline_phones' => ['required'],
                'address_id' => ['required'],
            ],
            default => [],
        };
    }
}
