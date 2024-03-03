<?php

namespace Modules\Assestents\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssestentResource extends JsonResource
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
