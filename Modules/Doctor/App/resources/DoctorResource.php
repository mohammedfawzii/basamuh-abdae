<?php

namespace Modules\Doctor\App\resources;
use Illuminate\Http\Resources\Json\JsonResource;
class DoctorResource extends JsonResource
{
//    private mixed $marital_status;

    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return[
            'name' => $this-> name,

        ];
    }
}
