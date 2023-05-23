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
        Schema::create('free_register_miembro', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contacto')->nullable();
            $table->string('ap_contacto')->nullable();
            $table->string('num_contacto')->nullable();
            $table->string('num_sec')->nullable();
            $table->string('correo_personal')->nullable();
            $table->string('password')->nullable();
            $table->string('nom_empresa')->nullable();
            $table->integer('id_usuario')->default(0);
            $table->integer('estatus')->default(0);
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
