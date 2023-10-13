<?php

namespace Database\Seeders;

use Domain\Merchant\Merchant;
use Illuminate\Database\Seeder;
use Domain\Merchant\Enums\MerchantStatus;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Merchant::query()->create([
            'name' => 'Example merchant',
            'status' => MerchantStatus::Active,
            'registered_at' => now(),
        ]);
    }
}
