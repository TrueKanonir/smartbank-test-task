<?php

namespace App\Http\Api\V1\Shop;

use Domain\Shop\Shop;
use Illuminate\Http\JsonResponse;

class DeleteShopController
{
    /**
     * @param \Domain\Shop\Shop $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Shop $shop): JsonResponse
    {
        $shop->delete();

        return new JsonResponse(status: 204);
    }
}
