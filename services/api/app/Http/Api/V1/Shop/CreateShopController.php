<?php

namespace App\Http\Api\V1\Shop;

use App\Services\ShopService;
use Domain\Merchant\Merchant;
use Domain\Shop\Data\ShopData;
use Illuminate\Http\JsonResponse;

class CreateShopController
{
    /**
     * @param \App\Services\ShopService $service
     * @param \Domain\Merchant\Merchant $merchant
     * @param \Domain\Shop\Data\ShopData $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ShopService $service, Merchant $merchant, ShopData $data): JsonResponse
    {
        $service->create($merchant, $data);

        return new JsonResponse(status: 201);
    }
}
