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
        Schema::create('consultants', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->foreignId('service_id')->constrained('consultation_services')->onDelete('cascade'); // Added cascade delete to service_id
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('consultation_services')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade');
            $table->timestamps();

            // Index foreign key columns for performance
            $table->index('service_id');
            $table->index('user_id');
            $table->index('session_id');
            $table->index('consultant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('consultants');
    }
};
