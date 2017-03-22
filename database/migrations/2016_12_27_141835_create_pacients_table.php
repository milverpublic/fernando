<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacients', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->string('derivado_por');
            $table->string('motivo_consulta');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacients');
    }
}
