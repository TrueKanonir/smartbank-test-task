<?php

namespace Domain\Merchant\Filters;

use Domain\Merchant\Enums\MerchantStatus;
use Illuminate\Http\Request;
use Domain\Merchant\Enums\FilterableColumn;
use Domain\Merchant\Builders\MerchantBuilder;

class DatabaseFilter
{
    public function __construct(
        protected Request $request
    ) {}

    /**
     * @param \Domain\Merchant\Builders\MerchantBuilder $builder
     * @return \Domain\Merchant\Builders\MerchantBuilder
     */
    public function handle(MerchantBuilder $builder): MerchantBuilder
    {
        foreach ($this->prepareFilterableColumns() as $method => $value) {
            if (! method_exists($this, $method)) {
                continue;
            }

            $this->$method($builder, $value);
        }

        return $builder;
    }

    protected function name(MerchantBuilder $builder, string $value)
    {
        $builder->where('name', 'ilike', '%' . $value . '%');
    }

    protected function status(MerchantBuilder $builder, string $value)
    {
        $builder->where('status', MerchantStatus::tryFrom($value));
    }

    /**
     * @return string[]
     */
    private function prepareFilterableColumns(): array
    {
        return array_filter(
            $this->retrieveFilterableColumns(),
            fn (string $value) => strlen($value) > 0
        );
    }

    /**
     * @return array<string, string>
     */
    private function retrieveFilterableColumns(): array
    {
        return $this
            ->request
            ->only(array_column(FilterableColumn::cases(), 'value'));
    }
}
