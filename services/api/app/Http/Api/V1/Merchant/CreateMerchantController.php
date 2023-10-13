<?php

namespace App\Http\Api\V1\Merchant;

use App\Services\MerchantService;
use Illuminate\Http\JsonResponse;
use Domain\Merchant\Data\MerchantData;

class CreateMerchantController
{
    /**
     * @param \App\Services\MerchantService $service
     * @param \Domain\Merchant\Data\MerchantData $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(MerchantService $service, MerchantData $data): JsonResponse
    {
        $service->create($data);

        return new JsonResponse(status: 201);
    }
}
