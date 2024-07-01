<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserDeviceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'platform' => 'nullable|string',
            'device_id_type' => 'required|string',
            'device_id_number' => 'nullable|string',
            'is_primary' => 'nullable|integer',
            'status' => 'required|string',
            'os_version' => 'nullable|string',
            'model' => 'nullable|string',
            'firebase_token' => 'nullable|string',
        ];
    }
}
