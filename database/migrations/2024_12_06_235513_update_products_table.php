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
        Schema::create('brands', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::table('products', function(Blueprint $table){
            $table->dropColumn('brand');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function(Blueprint $table){
            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');
            $table->string('brand');
        });

        Schema::dropIfExists('brands');
    }
};
