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
        Schema::create('pqrs_response_validate_services', function (Blueprint $table) {
            $table->foreignId('id_pqrs')->references('id')->on('pqrs_gcb')->onDelete('cascade');
            $table->foreignId('id_validate_service_qst')->references('id')->on('pqrs_validate_service_qst')->onDelete('cascade');
            $table->integer('value');
            $table->text('observation');
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
        Schema::dropIfExists('pqrs_response_validate_services');
    }
};
