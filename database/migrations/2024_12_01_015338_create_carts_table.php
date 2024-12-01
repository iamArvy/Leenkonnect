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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->string('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');            $table->integer('quantity')->default(1);
            $table->timestamps();

            // Add an index to foreign key columns for better query performance
            $table->index('user_id');
            $table->index('product_id');
            $table->index('session_id');

            // Ensure that a user cannot add the same product to the cart multiple times
            $table->unique(['user_id', 'product_id'], 'unique_user_product_cart');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
