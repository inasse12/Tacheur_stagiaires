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
        Schema::create('tacheur_services', function (Blueprint $table) {
            $table->id();
            $table->string('tarifs');
            $table->string('Task_Location');
            $table->foreignId('service_id')->constrained();
            $table->foreignId('tacheur_id')->constrained();
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
        Schema::dropIfExists('tacheur_services');
    }
};
