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
        Schema::create('driving_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('id_number')->nullable();
            $table->string('slug')->nullable();
            $table->string('car_photo')->nullable();
            $table->string('total_members')->nullable();
            $table->string('plate_number')->nullable();
            $table->string('license_number')->nullable();
            $table->string('category')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamp('time_in')->nullable();
            $table->timestamp('time_out')->nullable();
            $table->longText('visiting_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_visitors');
    }
};
