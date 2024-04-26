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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mesa_id');
            $table->unsignedBigInteger('cliente_id');
            $table->date('Fecha Reserva');
            $table->time('Hora de la reserva');
            $table->integer('Numero de personas');
            $table->timestamps();

            $table->foreign('mesa_id')->references('id')->on('mesas');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');

    }
};
