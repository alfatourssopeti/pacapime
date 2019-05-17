<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TimelinePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeline_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('desc',2000);
            $table->string('label');
            $table->integer('year');
            $table->integer('timeline_id');
            $table->integer('label_isactive');
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
        Schema::dropIfExists('timeline');
    }
}
