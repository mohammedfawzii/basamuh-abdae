<?php

namespace Modules\Prescriptions\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class prescriptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
