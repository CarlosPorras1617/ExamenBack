<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('idFactura'); //id autoincrement
            $table->unsignedBigInteger('idCliente')->nullable();
            $table->date('Fecha')->nullable();
            $table->Integer('Numero');
            $table->float('IVA');

            $table->timestamps();

            $table->foreign('idCliente')->on('clientes')->references('idCliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
};
