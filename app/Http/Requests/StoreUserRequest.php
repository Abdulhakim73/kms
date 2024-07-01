<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'full_name' => 'nullable|string|max:128',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users,email|max:64',
            'photo' => 'nullable|file|mimes:jpg,jpeg,pgn,svg',
            'district_id' => 'required|integer|exists:districts,id',
            'region_id' => 'required|integer|exists:regions,id',
            'street' => 'required|string',
            'role_id' => 'required|integer|exists:roles,id',
            'status' => ['nullable', Rule::in('inactive', 'on_vacation')],
            'phone' => 'nullable|numeric|digits:12|regex:/(998)[0-9]{9}/',
            'birthday' => 'nullable|date',
            'branch_id' => 'required|integer|exists:branches,id',
        ];
    }
}
