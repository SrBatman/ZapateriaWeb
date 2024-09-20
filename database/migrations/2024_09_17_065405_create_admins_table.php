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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('adminId');
            $table->string('nombres', 250);
            $table->string('apellidos', 250);
            $table->string('correo', 250);
            $table->string('password', 255);
            $table->string('imagen', 255);
            $table->integer('estatus');
            $table->string('direccion', 250)->nullable();
            $table->integer('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
