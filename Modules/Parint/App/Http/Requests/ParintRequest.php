<?php

namespace Modules\Parint\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParintRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'job' => 'required',
            'age' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
