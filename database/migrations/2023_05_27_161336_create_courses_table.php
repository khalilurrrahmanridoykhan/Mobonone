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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('courses_id');
            $table->string('courses_title',100)->nullable();
            $table->string('courses_code',100)->nullable();
            $table->decimal('credit',5, 2)->nullable();
            $table->string('course_type',100)->nullable();
            $table->integer('status')->default(1);
            $table->string('paralal_courses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
