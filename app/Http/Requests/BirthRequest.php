<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BirthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'data_birth' => 'date',
            'location_birth' => 'string|max:255',
            'weight' => 'int|max:500',
            'height' => 'int|max:500',
            'eye_color' => 'string|max:55',
            'hair_color' => 'string|max:55',
            'nationality' => 'string|max:255', //@TODO(Создать отдельную таблицу для национальности)
        ];
    }
}
