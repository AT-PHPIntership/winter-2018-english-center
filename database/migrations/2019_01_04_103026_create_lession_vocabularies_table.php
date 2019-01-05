<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessionVocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lession_vocabularies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lession_id')->unsigned();
            $table->integer('vocabulary_id')->unsigned();
            $table->foreign('lession_id')->references('id')->on('lessions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vocabulary_id')->references('id')->on('vocabularies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lession_vocabularies');
    }
}
