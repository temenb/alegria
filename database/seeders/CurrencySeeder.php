<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;;

class CurrencySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['id'=> 840, 'code'=> 'USD', 'name' => 'US Dollar', 'symbol' => '$', 'fraction' => 2],
            ['id'=> 978, 'code'=> 'EUR', 'name' => 'Euro', 'symbol' => '€', 'fraction' => 2],
            ['id'=> 980, 'code'=> 'UAH', 'name' => 'Hryvnia', 'symbol' => '₴', 'fraction' => 2],
            ['id'=> 156, 'code'=> 'CNY', 'name' => 'Yuan Renminbi', 'symbol' => '¥', 'fraction' => 2],
        ];

        array_map(function ($arrCurrency) {
            $currency = new Currency($arrCurrency);
            $currency->save();
        }, $currencies);
    }
}
