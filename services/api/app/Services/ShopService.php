<?php

namespace App\Services;

use Domain\Shop\Shop;
use Domain\Merchant\Merchant;
use Domain\Shop\Data\ShopData;
use Domain\Shop\Data\CoordinateData;
use Illuminate\Database\Eloquent\Collection;
use Domain\Shop\ValueObject\DistanceCalculator;

class ShopService
{
    /**
     * @param \Domain\Merchant\Merchant $merchant
     * @param \Domain\Shop\Data\CoordinateData $data
     * @return \Illuminate\Database\Eloquent\Collection<Shop>
     */
    public function getNearestShopsOf(Merchant $merchant, CoordinateData $data): Collection
    {
        return $merchant
            ->shops()
            ->get()
            ->sortBy([fn (Shop $shop) => DistanceCalculator::calculate(
                $data,
                $shop->coordinates
            )]);
    }

    /**
     * @param \Domain\Merchant\Merchant $merchant
     * @param \Domain\Shop\Data\ShopData $data
     * @return void
     */
    public function create(Merchant $merchant, ShopData $data): void
    {
        $merchant->shops()->create($data->all());
    }

    /**
     * @param \Domain\Shop\Shop $shop
     * @param \Domain\Shop\Data\ShopData $data
     * @return void
     */
    public function update(Shop $shop, ShopData $data): void
    {
        $shop->update($data->all());
    }
}
