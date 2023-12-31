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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('intal',100)->nullable();
            $table->string('postion',100)->nullable();
            $table->string('phone_ext',100)->nullable();
            $table->string('room_no',100)->nullable();
            $table->integer('Mobile_number')->nullable();
            $table->decimal('tacken_credit',5, 2)->default(0);
            $table->integer('status')->default(0);
            $table->string('img')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
