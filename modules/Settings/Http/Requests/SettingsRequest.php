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
                'title' => ['nullable'],
                'description' => ['nullable'],
                'keywords' => ['nullable'],
                'logo' => ['nullable'],
                'icon' => ['nullable'],
                'phones' => ['nullable'],
                'address_text' => ['nullable'],
            ],
            default => [],
        };
    }
}
