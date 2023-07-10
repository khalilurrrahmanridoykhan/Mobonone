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
        Schema::create('singel_user_couses', function (Blueprint $table) {
            $table->id('singel_user_couses_id');
            $table->string('user_id')->nullable();
            $table->string('course_no_1')->nullable();
            $table->string('course_no_2')->nullable();
            $table->string('course_no_3')->nullable();
            $table->string('course_no_4')->nullable();
            $table->string('course_no_5')->nullable();
            $table->string('Total_cridit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singel_user_couses');
    }
};
