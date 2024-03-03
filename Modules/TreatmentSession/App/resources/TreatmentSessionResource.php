<?php


namespace Modules\TreatmentSession\App\resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentSessionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'price' => $this-> price,
            'medical_specialty_id'=>$this->medical_specialty_id,
            'doctor_id'=>$this->doctor_id,
        ];
    }
}
