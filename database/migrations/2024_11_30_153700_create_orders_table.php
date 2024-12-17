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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Ensure order_number is unique
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->integer('total');
            $table->enum('status', ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();

            // Index for frequently queried columns
            $table->index('order_number');
            $table->index('user_id');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();

            // Index for frequently queried columns
            $table->index('order_id');
            $table->index('product_id');

            $table->unique(['order_id', 'product_id'], 'unique_order_product');
        });

        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->enum('status', ['pending', 'shipped', 'delivered'])->default('pending');
            $table->json('address');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();

            // Index for order_id in deliveries table
            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
