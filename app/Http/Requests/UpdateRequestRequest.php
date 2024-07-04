<?php

namespace App\Http\Requests;

use App\Models\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file_name' => 'nullable|string',
            'type' => ['nullable', Rule::in([
                Request::TYPE_CREATE, Request::TYPE_DELETE, Request::TYPE_REFRESH_EXPIRY,
            ])],
            'status' => ['nullable', Rule::in([
                Request::STATUS_REJECT, Request::STATUS_RESOLVE
            ])],
            'petition_text' => 'nullable|string',
            'device_id' => 'nullable|integer',
            'operator_id' => 'nullable|integer',
            'client_id' => 'nullable|integer',
            'request' => 'nullable|string',
            "container" => 'nullable|string',
        ];
    }
}
