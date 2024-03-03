<?php

namespace Modules\MedicalSpecialtys\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalSpecialtyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'name' => $this-> name,
        ];
    }
}
