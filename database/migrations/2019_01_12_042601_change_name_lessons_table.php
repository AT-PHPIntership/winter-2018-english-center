<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::rename('lessions', 'lessons');
        Schema::table('lesson_vocabularies', function (Blueprint $table) {
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade')->onUpdate('cascade');
        });
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
        Schema::table('lesson_vocabularies', function (Blueprint $table) {
            $table->dropForeign('lesson_vocabularies_lesson_id_foreign');
        });
        Schema::rename('lessons', 'lessions');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
