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
        Schema::create('categories', function(Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('image', 2048);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->text('description');
            $table->integer('price');
            $table->json('gallery')->nullable();
            $table->integer('stock');
            $table->json('features')->nullable();
            $table->json('tags')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->index('sku');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
