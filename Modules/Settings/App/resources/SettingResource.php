<?php

namespace Modules\Settings\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class settingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'name' => $this-> name,
            'phone' => $this-> email,
            'address' => $this-> address,
        ];
    }
}
