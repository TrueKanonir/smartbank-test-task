<?php

namespace App\Http\Api\V1\Merchant;

use Domain\Merchant\Merchant;
use Domain\Merchant\Resources\MerchantResource;

class ViewMerchantController
{
    /**
     * @param \Domain\Merchant\Merchant $merchant
     * @return \Domain\Merchant\Resources\MerchantResource
     */
    public function __invoke(Merchant $merchant): MerchantResource
    {
        return MerchantResource::make($merchant);
    }
}
