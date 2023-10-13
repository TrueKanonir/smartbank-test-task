<?php

namespace App\Http\Api\V1\Shop;

use Domain\Shop\Shop;
use App\Services\ShopService;
use Domain\Shop\Data\ShopData;
use Illuminate\Http\JsonResponse;

class UpdateShopController
{
    /**
     * @param \App\Services\ShopService $service
     * @param \Domain\Shop\Shop $shop
     * @param \Domain\Shop\Data\ShopData $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ShopService $service, Shop $shop, ShopData $data): JsonResponse
    {
        $service->update($shop, $data);

        return new JsonResponse(status: 204);
    }
}
