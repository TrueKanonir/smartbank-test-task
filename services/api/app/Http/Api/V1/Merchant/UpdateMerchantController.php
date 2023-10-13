<?php

namespace App\Http\Api\V1\Merchant;

use Domain\Merchant\Merchant;
use App\Services\MerchantService;
use Illuminate\Http\JsonResponse;
use Domain\Merchant\Data\MerchantData;

class UpdateMerchantController
{
    /**
     * @param \App\Services\MerchantService $service
     * @param \Domain\Merchant\Merchant $merchant
     * @param \Domain\Merchant\Data\MerchantData $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(MerchantService $service, Merchant $merchant, MerchantData $data): JsonResponse
    {
        $service->update($merchant, $data);

        return new JsonResponse(status: 204);
    }
}
