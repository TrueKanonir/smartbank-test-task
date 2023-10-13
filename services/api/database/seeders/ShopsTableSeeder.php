<?php

namespace Database\Seeders;

use Domain\Merchant\Merchant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \Domain\Merchant\Merchant $merchant */
        $merchant = Merchant::query()->first();

        $merchant->shops()->createMany($this->data());
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function data(): Collection
    {
        return Collection::make([
            [
                'address' => 'улица Нукус, 16',
                'schedule' => '9:00 - 18:00',
                'longitude' => 69.285306,
                'latitude' => 41.296688,
            ],
            [
                'address' => 'проспект Амира Темура, 98',
                'schedule' => '9:00 - 18:00',
                'longitude' => 69.285540,
                'latitude' => 41.337392,
            ],
            [
                'address' => '14-й квартал, 14',
                'schedule' => '9:00 - 18:00',
                'longitude' => 69.193660,
                'latitude' => 41.295692,
            ],
        ]);
    }
}
