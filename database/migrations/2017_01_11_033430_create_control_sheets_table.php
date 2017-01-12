<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateControlSheetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_tratamiento');
            $table->string('tratamiento');
            $table->string('tratamiento_next');
            $table->integer('pacient_id')->unsigned();
            $table->foreign('pacient_id')->references('id')->on('pacients')->onDelete('cascade');
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
        Schema::drop('control_sheets');
    }
}
