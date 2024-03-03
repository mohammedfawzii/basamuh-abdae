<?php

namespace Modules\Patients\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'name' => 'required',
            'age'=>'required',
            'sex_status'=>'required',
            'parint_id'=>'required'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
