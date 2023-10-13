<?php

use Illuminate\Support\Facades\Route;
use App\Http\Api\V1\Auth\LoginController;
use App\Http\Api\V1\Shop\GetShopController;
use App\Http\Api\V1\Shop\CreateShopController;
use App\Http\Api\V1\Shop\UpdateShopController;
use App\Http\Api\V1\Shop\DeleteShopController;
use App\Http\Api\V1\Merchant\GetMerchantController;
use App\Http\Api\V1\Merchant\ViewMerchantController;
use App\Http\Api\V1\Merchant\DeleteMerchantController;
use App\Http\Api\V1\Merchant\CreateMerchantController;
use App\Http\Api\V1\Merchant\UpdateMerchantController;

Route::prefix('v1')->group(function () {
    # Auth
    Route::prefix('auth')->group(function () {
        Route::post('login', LoginController::class);
    });

    # Merchant
    Route::prefix('merchants')->group(function () {
        Route::get('/', GetMerchantController::class);
        Route::get('{merchant}', ViewMerchantController::class);
        Route::post('/', CreateMerchantController::class);
        Route::put('{merchant}', UpdateMerchantController::class);
        Route::delete('{merchant}', DeleteMerchantController::class);

        # Shop
        Route::get('{merchant}/shops', GetShopController::class);
        Route::post('{merchant}/shops', CreateShopController::class);
        Route::patch('shops/{shop}', UpdateShopController::class);
        Route::delete('shops/{shop}', DeleteShopController::class);
    });
});
