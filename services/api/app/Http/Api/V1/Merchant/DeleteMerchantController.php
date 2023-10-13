<?php

namespace App\Http\Api\V1\Merchant;

use Domain\Merchant\Merchant;
use Illuminate\Http\JsonResponse;

class DeleteMerchantController
{
    /**
     * @param \Domain\Merchant\Merchant $merchant
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Merchant $merchant): JsonResponse
    {
        $merchant->delete();

        return new JsonResponse(status: 204);
    }
}
