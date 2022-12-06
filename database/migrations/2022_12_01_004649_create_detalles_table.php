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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id('idDetalle'); //id autoincrement
            $table->Integer('Cantidad');
            $table->string('descripcion',2000);
            $table->string('Precio');
            $table->unsignedBigInteger('idFactura')->nullable();

            $table->timestamps();

            $table->foreign('idFactura')->on('facturas')->references('idFactura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
};
