<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BusinessService;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_service', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')->index()->unsigned();
            $table->integer('business_id')->index()->unsigned();
            $table->enum(
                'aprox_price',
                [BusinessService::APROX_PRICE_LOW, BusinessService::APROX_PRICE_NORMAL, BusinessService::APROX_PRICE_HIGH,]
            )->nullable();
            $table->integer('price')->nullable();
            $table->integer('currency_id')->index()->unsigned()->nullable();
            $table->json('phones')->nullable();
            $table->json('social_networks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_service');
    }
};
