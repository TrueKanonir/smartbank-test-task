<?php

namespace Domain\Shop\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;

class ShopData extends Data
{
    public function __construct(
        #[Required, StringType, Min(5), Max(255)]
        public readonly string $address,

        #[Required, StringType, Min(10), Max(255)]
        public readonly string $schedule,

        #[Required, Numeric, Between(-180, 180)]
        public readonly float $longitude,

        #[Required, Numeric, Between(-90, 90)]
        public readonly float $latitude
    ) {}
}
