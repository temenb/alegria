<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\BusinessService;
use App\Models\Currency;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::doesNtHave('businesses')->inRandomOrder()->limit(10)
            ->each(function($user) {
                $businessServicePivotData = mt_rand(0,1)
                    ? ['price' => mt_rand(100, 100000), 'currency_id' => Currency::inRandomOrder()->first()->id,]
                    : ['aprox_price' => BusinessService::APROX_PRICES[array_rand(BusinessService::APROX_PRICES)]];

                Business::factory(1)
                    ->hasAttached(Service::inRandomOrder()->first(), $businessServicePivotData)
                    ->for($user)
                    ->create();
        });
    }
}
