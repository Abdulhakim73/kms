<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'region_id' => 'required|integer|exists:regions,id',
            'district_id' => 'required|integer|exists:districts,id',
            'street' => 'required|string',
            'email' => 'required|string|unique:clients,email',
            'organization' => 'required|string',
            'phone' => 'required|string|digits:12|unique:clients,phone',
            'certification' => 'required|string',

            // 'user_id' => 'required|integer|exists:users,id',
            // 'type_certificate' => 'required|string',
            // 'type_client' => 'required|string',
            // 'name_owner' => 'required|string',
            // 'full_name_director' => 'required|string',
            // 'full_name_accountant' => 'required|string',
            // 'document_file' => 'required|string'
            // 'user_id' => 'required|integer|exists:users,id',
            // 'iabs_id' => 'nullable|integer',
            // 'type_certificate' => 'required|string',
            // 'type_client' => 'required|string',
            // 'name_owner' => 'required|string',
            // 'full_name_director' => 'required|string',
            // 'full_name_accountant' => 'required|string',
            // 'state' => 'required|integer|exists:states,id',
            // 'city' => 'required|integer|exists:cities,id',
            // 'region' => 'required|integer|exists:regions,id',
            // 'street' => 'required|integer|exists:streets,id',
            // 'email' => 'required|email',
            // 'organization' => 'required|string',
            // 'divisions' => 'required|string',
            // 'inn' => 'required|string',
            // 'pinfl' => 'required|string',
            // 'phone' => 'required|string',
            // 'token_type' => 'required|string',
            // 'serial_number_token' => 'required|string',
            // 'document_file' => 'required|string',
        ];
    }
}
