<?php

namespace App\Http\Api\V1\Merchant;

use App\Services\MerchantService;
use Domain\Merchant\Filters\DatabaseFilter;
use Domain\Merchant\Resources\MerchantResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetMerchantController
{
    /**
     * @param \App\Services\MerchantService $service
     * @param \Domain\Merchant\Filters\DatabaseFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(MerchantService $service, DatabaseFilter $filter): AnonymousResourceCollection
    {
        return MerchantResource::collection(
            $service->getMerchants($filter)
        );
    }
}
