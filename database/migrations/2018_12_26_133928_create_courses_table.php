<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            NestedSet::columns($table);
            $table->foreign('parent_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('count_view');
            $table->integer('total_rating')->default(0);
            $table->float('average')->comment('average rating');
            $table->boolean('flag')->comment('0:TRIAL account, 1:VIP account');
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
        Schema::dropIfExists('courses');
    }
}
