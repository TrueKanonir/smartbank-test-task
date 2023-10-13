<?php

namespace App\Http\Api\V1\Shop;

use App\Services\ShopService;
use Domain\Merchant\Merchant;
use Domain\Shop\Data\CoordinateData;
use Domain\Shop\Resources\ShopResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetShopController
{
    /**
     * @param \App\Services\ShopService $service
     * @param \Domain\Merchant\Merchant $merchant
     * @param \Domain\Shop\Data\CoordinateData $data
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(ShopService $service, Merchant $merchant, CoordinateData $data): AnonymousResourceCollection
    {
        return ShopResource::collection(
            $service->getNearestShopsOf($merchant, $data)
        );
    }
}
