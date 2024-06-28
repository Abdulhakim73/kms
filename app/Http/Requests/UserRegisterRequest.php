<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'photo' => 'nullable|string',
            'region_id' => 'required|integer|exists:regions,id',
            'district_id' => 'required|integer|exists:districts,id',
            'street' => 'required|string',
            'language' => ['nullable', 'string', Rule::in('ru', 'uz')],
            'password' => 'required|string|min:6|required',
            'confirm_password' => 'same:password',
            'phone' => 'required|string|digits:12|unique:users',
            'birthday' => 'nullable|date',
            'branch_id' => 'required|integer|exists:branch_users,id'
        ];
    }
}
