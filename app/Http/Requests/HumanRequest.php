<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HumanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'last_name' => 'string',
            'sur_name' => 'string',
            'birth_id' => 'int',
            'generations_id' => 'int',
            'father_id' => 'int',
            'mother_id' => 'int',
            'brothers_or_sisters_id' => 'int',
            'rodovayakniga_id' => 'int',
        ];
    }
}
