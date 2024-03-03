<?php

namespace Modules\MedicalSpecialtys\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalSpecialtyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
