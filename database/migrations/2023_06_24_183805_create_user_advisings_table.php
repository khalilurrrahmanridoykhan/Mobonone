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
        Schema::create('user_advisings', function (Blueprint $table) {
            $table->id('user_advisings_id');
            $table->string('user_id')->nullable();
            $table->string('time_no',100)->nullable();
            $table->string('day_no',100)->nullable();
            $table->string('faculties_id',100)->nullable();
            $table->string('Section_no',100)->nullable();
            $table->string('courses_no',100)->nullable();
            $table->string('room_no_for_class_no',100)->nullable();
            $table->string('courses_cridit',100)->nullable();
            $table->string('semester_no',100)->nullable();
            $table->string('year_no',100)->nullable();
            $table->text('ifstudenttimeslotunice')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_advisings');
    }
};
