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
        Schema::create('costumers', function (Blueprint $table) {
            $table->id('clienteId');
            $table->string('nombres', 250);
            $table->string('apellidos', 250);
            $table->string('correo', 250);
            $table->string('password', 255);
            $table->string('imagen', 255);
            $table->integer('estatus');
            $table->boolean('verificado')->default(0);
            $table->string('direccion', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumers');
    }
};
