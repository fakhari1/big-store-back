<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
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
                'app_name' => ['required'],
                'description' => ['required'],
                'landline_phones' => ['required', 'array'],
                'address' => ['required'],
                'instagram_id' => ['nullable', 'string', 'min:5'],
                'telegram_id' => ['nullable', 'string', 'min:5'],
            ],
            default => [],
        };
    }
}
