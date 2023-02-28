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
        Schema::create('free_register_partner', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('nom_contacto');
            $table->string('ap_contacto');
            $table->string('num_contacto');
            $table->string('num_sec')->nullable();
            $table->string('correo_empresarial');
            $table->string('password');
            $table->string('nom_empresa');
            $table->string('website');
            $table->string('curriculum')->nullable();
            $table->integer('estatus')->default(0);
            //SE COMPLETAN SI SE APRUEBA AL PARTNER
            $table->longText('resumen')->nullable();
            $table->longText('clientes')->nullable();
            $table->longText('servicios')->nullable();
            $table->longText('anios_mercado')->nullable();
            $table->integer('id_usuario')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('free_register_partner');
    }
};
