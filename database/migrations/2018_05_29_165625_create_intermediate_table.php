<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntermediateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('tag_id');
            $table->index(['blog_id', 'tag_id']);
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
        Schema::dropIfExists('blog_tag');
    }
}
