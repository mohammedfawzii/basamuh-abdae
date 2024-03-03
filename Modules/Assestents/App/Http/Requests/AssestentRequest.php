<?php

namespace Modules\Assestents\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssestentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'emile' => 'nullable',
            'military_service_status' => 'nullable',
            'img' => 'nullable',
            'qualification' => 'nullable',
            'nationalityID' => 'nullable',
            'qualification_degree' => 'nullable',
            'sex_status' => 'nullable',
            'address' => 'nullable',
            'email' => 'nullable',
            'marital_status' => 'nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
