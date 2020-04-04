<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxmenusTable extends Migration
{
    //提交
    public function up()
    {
        Schema::create('wxmenus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('data')->comment('标题|input');
        });
    }

    //回滚
    public function down()
    {
        Schema::dropIfExists('wxmenus');
    }
}
