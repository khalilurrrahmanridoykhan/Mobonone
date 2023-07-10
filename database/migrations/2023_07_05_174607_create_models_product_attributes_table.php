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
        Schema::create('models_product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->decimal('price')->nullable();
            $table->unsignedInteger('products_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models_product_attributes');
    }
};
