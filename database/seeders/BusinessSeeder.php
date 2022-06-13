<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;;

class BusinessSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory(10)->hasBusiness(1)->create();
        $users->each(function($user) {
            /** @var \App\Models\User $user */
            $user->business->each(function($business) {
                $limit = mt_rand(1,3);
                $services = Service::inRandomOrder()->limit($limit)->get();
                $business->services()->saveMany($services);
            });
        });
    }
}
