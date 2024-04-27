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
            $table->date('Fecha_Reserva');
            $table->time('Hora_de_la_reserva');
            $table->integer('Numero_de_personas');
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
