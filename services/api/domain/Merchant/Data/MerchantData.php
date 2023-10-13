<?php

namespace Domain\Merchant\Data;

use Spatie\LaravelData\Data;
use Domain\Merchant\Enums\MerchantStatus;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;

class MerchantData extends Data
{
    public function __construct(
        #[Required, StringType, Min(2), Max(64)]
        public readonly string $name,

        #[Required, Enum(MerchantStatus::class)]
        public readonly MerchantStatus $status,
    ) {}
}
