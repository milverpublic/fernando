<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_section');
            $table->integer('section_id')->nullable()->unsigned();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->string('code_section');
            $table->integer('order')->nullable();
            $table->string('route')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('printable')->default(true);
            $table->boolean('enable')->default(true);
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
        Schema::drop('sections');
    }
}
