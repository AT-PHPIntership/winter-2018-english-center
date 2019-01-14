<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameLessonsVocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::table('lession_vocabularies', function (Blueprint $table) {
            $table->dropForeign('lession_vocabularies_lession_id_foreign');
        });
        Schema::table('lession_vocabularies', function (Blueprint $table) {
            $table->renameColumn('lession_id', 'lesson_id');
        });
        Schema::rename('lession_vocabularies', 'lesson_vocabularies');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::rename('lesson_vocabularies', 'lession_vocabularies');
        Schema::table('lession_vocabularies', function (Blueprint $table) {
            $table->renameColumn('lesson_id', 'lession_id');
        });
        Schema::table('lession_vocabularies', function (Blueprint $table) {
            $table->foreign('lession_id')->references('id')->on('lessions')->onDelete('cascade')->onUpdate('cascade');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
