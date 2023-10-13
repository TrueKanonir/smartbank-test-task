<?php

namespace Domain\Merchant\Builders;

use Illuminate\Database\Eloquent\Builder;
use Domain\Merchant\Filters\DatabaseFilter;

class MerchantBuilder extends Builder
{
    /**
     * The model being queried.
     *
     * @var \Domain\Merchant\Merchant
     */
    protected $model;

    /**
     * @param \Domain\Merchant\Filters\DatabaseFilter $filter
     * @return static
     */
    public function filter(DatabaseFilter $filter): static
    {
        return $filter->handle($this);
    }
}
