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
        Schema::create('home_page_hero_slides', function (Blueprint $table) {
            $table->id('home_page_hero_slides_id');
            $table->string('titile_top',100)->nullable();
            $table->string('titile_main',100)->nullable();
            $table->string('titile_buttom',100)->nullable();
            $table->string('font_img')->nullable();
            $table->string('bg_img')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_hero_slides');
    }
};
