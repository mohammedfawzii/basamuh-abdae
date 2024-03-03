<?php

namespace Modules\Parint\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParintResource extends JsonResource
{

    public function toArray($request): array
    {
        return[
            'name' => $this-> name,
        ];
    }
}
