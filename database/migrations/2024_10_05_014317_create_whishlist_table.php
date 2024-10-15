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
        Schema::create('whishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('costumerId');
            $table->unsignedBigInteger('productId');
            $table->foreign('costumerId')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whishlist');
    }
};
