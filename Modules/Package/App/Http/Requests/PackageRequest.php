<?php

namespace Modules\Package\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'treatment_session_ids' => 'required|array',
            'quantities' => 'required|array',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
