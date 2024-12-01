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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');            $table->string('email');
            $table->string('name');
            $table->string('subject');
            $table->json('content');
            $table->timestamps();

            // Optional: Index the foreign key column for better performance
            $table->index('session_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
