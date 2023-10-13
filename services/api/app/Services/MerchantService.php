<?php

namespace App\Services;

use Domain\Merchant\Filters\DatabaseFilter;
use Domain\Merchant\Merchant;
use Domain\Merchant\Data\MerchantData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MerchantService
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getMerchants(DatabaseFilter $filter): LengthAwarePaginator
    {
        return Merchant::query()
            ->filter($filter)
            ->paginate();
    }

    /**
     * @param \Domain\Merchant\Data\MerchantData $data
     * @return void
     */
    public function create(MerchantData $data): void
    {
        Merchant::query()->create(
            $data->additional(['registered_at' => now()])->all()
        );
    }

    /**
     * @param \Domain\Merchant\Merchant $merchant
     * @param \Domain\Merchant\Data\MerchantData $data
     * @return void
     */
    public function update(Merchant $merchant, MerchantData $data): void
    {
        $merchant->update($data->all());
    }
}
