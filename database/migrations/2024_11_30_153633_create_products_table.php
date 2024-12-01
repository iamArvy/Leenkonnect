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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('image', 2048);
            $table->string('category');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->json('gallery')->nullable();
            $table->integer('stock')->default(0);
            $table->string('model')->nullable();
            $table->string('brand')->nullable();
            $table->json('features')->nullable();
            $table->json('tags')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->index('sku');
            $table->index('category');
        });

        Schema::create('featured_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_products');
        Schema::dropIfExists('products');
    }
};
