<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'city_id' => 'required|integer|exists:cities,id',
            'region_id' => 'required|integer|exists:regions,id',
            'street' => 'required|string',
            'email' => 'required|string|unique:clients,email',
            'organization' => 'required|string',
            'phone' => 'required|string|digits:12|unique:clients,phone',
            'certification' => 'required|string',
        ];
    }
}
