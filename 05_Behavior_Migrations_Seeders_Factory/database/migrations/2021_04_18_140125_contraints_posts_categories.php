<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContraintsPostsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //Campo não assinado int, igual ao id
            $table->unsignedInteger('category');
            //Chave estrangeira, referenciada ao id de categories, deletar todos os posts
            // caso a categoria seja deletada
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //Deleta a chave estrangeira
            $table->dropForeign('posts_category_foreign');
            //Deleta a coluna category
            $table->dropColumn('category');
        });
    }
}
