<?php

namespace Modules\Employees\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeResource extends JsonResource
{
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
