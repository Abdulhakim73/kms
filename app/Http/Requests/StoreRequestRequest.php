<?php

namespace App\Http\Requests;

use App\Models\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file_name' => 'required|string',
            'type' => ['nullable', Rule::in([
                Request::TYPE_CREATE, Request::TYPE_DELETE, Request::TYPE_REFRESH_EXPIRY,
            ])],
            'status' => ['nullable', Rule::in([
                Request::STATUS_REJECT, Request::STATUS_RESOLVE
            ])],
            'petition_text' => 'required|string',
            'device_id' => 'required|integer',
            'operator_id' => 'required|integer',
            'client_id' => 'required|integer',
            'request' => 'required|string',
            "container" => 'required|string',
        ];
    }
}
