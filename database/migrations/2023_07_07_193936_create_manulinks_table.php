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
        Schema::create('manulinks', function (Blueprint $table) {
            $table->id('manulinks_id');
            $table->string('page_name')->nullable();
            $table->string('page_link')->nullable();
            $table->integer('dropdown')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manulinks');
    }
};
