<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Service::factory(10)->create();
    }
}
