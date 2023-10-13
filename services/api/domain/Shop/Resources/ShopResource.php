<?php

namespace Domain\Shop\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var \Domain\Shop\Shop
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'address' => $this->resource->address,
            'schedule' => $this->resource->schedule,
            'longitude' => $this->resource->longitude,
            'latitude' => $this->resource->latitude,
        ];
    }
}
