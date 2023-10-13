<?php

namespace Domain\Shop\Data;

use Spatie\LaravelData\Data;

class CoordinateData extends Data
{
    public function __construct(
        public readonly float $longitude,
        public readonly float $latitude
    ) {}
}
