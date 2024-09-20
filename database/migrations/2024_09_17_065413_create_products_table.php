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
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->decimal('descuento', 5, 2)->default(0.00);
            $table->string('imagen', 255)->nullable();
            $table->string('imagen2', 255)->nullable();
            $table->string('imagen3', 255)->nullable();
            $table->enum('estatus', ['Disponible', 'No Disponible']);
            $table->foreignId('proovedorId')->constrained('proovedor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
