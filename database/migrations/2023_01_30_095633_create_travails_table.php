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
        Schema::create('travails', function (Blueprint $table) {
            $table->id();
            $table->string('adresse');
            $table->string('detailTache');
            $table->string('etat')->nullable();
            $table->string('motifRefus')->nullable();
            $table->integer('note')->nullable();
            $table->dateTime('startTravail')->nullable();
            $table->dateTime('finTravail')->nullable();
            $table->integer('nbr_houre');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('tacheur_service_id')->constrained();
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
        Schema::dropIfExists('travails');
    }
};
