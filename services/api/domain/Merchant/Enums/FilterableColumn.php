<?php

namespace Domain\Merchant\Enums;

enum FilterableColumn: string
{
    case Name = 'name';
    case Status = 'status';
    case RegisteredAt = 'registered_at';
}
