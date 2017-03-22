<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateControlsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void control_sheets
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_trat');
            $table->string('description');
            $table->date('next_trat');
            $table->string('description_next');
            $table->string('status')->default('progress');
            $table->boolean('accepted')->default(false);
            $table->integer('control_sheet_id')->unsigned();
            $table->foreign('control_sheet_id')->references('id')->on('control_sheets')->onDelete('cascade');
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
        Schema::drop('controls');
    }
}
