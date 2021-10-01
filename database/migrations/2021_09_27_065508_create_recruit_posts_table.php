<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitPostsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('recruit_posts', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('position_slug');
            $table->integer('vacant');
            $table->string('gender');
            $table->string('job_code');
            $table->longText('job_descriptions');
            $table->longText('job_requirements');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('recruit_categories');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('recruit_posts');
    }
}
