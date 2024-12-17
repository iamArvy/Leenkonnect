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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number');
            $table->string('name');
            $table->string('email');
            $table->foreignId('specialisation_id')->constrained('specialisations')->onDelete('cascade');
            $table->foreignId('consultant_id')->nullable()->constrained('consultants')->onDelete('cascade');
            $table->enum('status', ['pending', 'confirmed', 'assigned', 'completed'])->default('pending');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['service_id', 'date', 'time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
