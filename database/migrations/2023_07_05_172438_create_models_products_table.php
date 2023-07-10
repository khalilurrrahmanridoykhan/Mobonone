<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('models_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('brand_id')->nullable();
            $table->string('category_id')->nullable();

            // Network
            $table->string('technology')->nullable();
            $table->string('twogbands')->nullable();
            $table->string('threegbands')->nullable();
            $table->string('fourgbands')->nullable();
            $table->string('fivergbands')->nullable();
            $table->string('speed')->nullable();

            // Launch
            $table->string('announced')->nullable();
            $table->string('availablety')->nullable();

            // Body
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->string('build')->nullable();
            $table->string('sim')->nullable();

            // Display
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->string('reslution')->nullable();

            // Platform
            $table->string('os')->nullable();
            $table->string('chipset')->nullable();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();

            // Memory
            $table->string('cardslot')->nullable();
            $table->string('internal')->nullable();

            // Main Camera
            $table->string('tripple')->nullable();
            $table->string('feature')->nullable();
            $table->string('videomain')->nullable();

            // Selfie Camera
            $table->string('single')->nullable();
            $table->string('videoselfie')->nullable();

            // Sound
            $table->string('loudspeaker')->nullable();
            $table->string('mmjack')->nullable();

            // Comms
            $table->string('wlantab')->nullable();
            $table->string('bluetootht')->nullable();
            $table->string('positioning')->nullable();
            $table->string('nfc')->nullable();
            $table->string('radio')->nullable();
            $table->string('usb')->nullable();

            // Features
            $table->string('sensor')->nullable();

            // Battery
            $table->string('ballerytype')->nullable();
            $table->string('charging')->nullable();

            // Misc
            $table->string('color')->nullable();
            $table->string('model')->nullable();
            $table->string('sar')->nullable();
            $table->string('price')->nullable();
            $table->string('sale_price')->nullable();


            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models_products');
    }
};
