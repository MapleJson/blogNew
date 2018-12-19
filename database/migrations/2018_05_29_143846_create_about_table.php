<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('siteName', 50)->comment('站点名称');
            $table->string('authorName', 50)->comment('作者名称');
            $table->string('profession', 200)->comment('职业');
            $table->string('keywords', 200)->comment('关键字');
            $table->string('description', 200)->comment('站点说明');
            $table->string('mood', 200)->comment('一句话描述自己');
            $table->text('content')->comment('一篇关于我的文章');
            $table->string('weChat', 50)->nullable()->comment('微信号');
            $table->string('weChatQR', 50)->nullable()->comment('微信二维码图片');
            $table->unsignedBigInteger('qq')->nullable()->comment('QQ号');
            $table->string('email', 100)->nullable()->comment('邮箱');
            $table->unsignedInteger('topPicCount', 5)->comment('首页顶部展示图片数');
            $table->unsignedInteger('bannersCount', 5)->comment('首页轮播展示几张照片');
            $table->unsignedInteger('blogShowCount', 5)->comment('首页博客展示几篇文章');
            $table->unsignedInteger('proposeCount', 5)->comment('推荐区展示几篇文章');
            $table->unsignedInteger('messageCount', 5)->comment('留言展示多少条');
            $table->unsignedInteger('rssSize', 5)->comment('订阅展示条数');
            $table->string('template', 50)->default('morning')->comment('模板风格');
            $table->unsignedTinyInteger('state')->default(2)->index()->comment('是否展示 1 展示 2 不展示');
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
        Schema::dropIfExists('about');
    }
}
