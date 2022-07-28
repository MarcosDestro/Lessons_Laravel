<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //auto incremento, chave primária e não assinado.
            $table->increments('id');
            //varchar de até 255
            $table->string('title');
            $table->string('subtitle');
            //text aceita bem mais caracteres
            $table->text('description');
            //date = Para agendamento da postagem
            $table->dateTime('publish_at');
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
        Schema::dropIfExists('posts');
    }
}
