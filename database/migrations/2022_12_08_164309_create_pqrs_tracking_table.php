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
        Schema::create('pqrs_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pqrs')->references('id')->on('pqrs_gcb')->onDelete('cascade');
            $table->integer('id_user');
            $table->text('message_tracking');
            $table->text('obersevation_user');
            $table->text('evidencia');
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
        Schema::dropIfExists('pqrs_tracking');
    }
};
