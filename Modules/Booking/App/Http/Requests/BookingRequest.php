<?php

namespace Modules\Booking\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'package_id'=>'required',
            'patient_id'=>'required|exists:packages,id',
//            'package_price'=>'required',
            'paid'=>'required',
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
