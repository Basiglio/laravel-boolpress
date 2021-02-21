<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_posts', function (Blueprint $table) {
            $table->id();
            // PRIMA IL NOME DELLA TABELLA DA INSERIRE SEGUITO DA _ID
            $table->unsignedBigInteger('post_id');


            //post status (public|private|draft)
            $table->string('post_status', 7);
            //post (public|private|draft)
            $table->string('comment_status', 7);
            // commento creazione dei campi
            //$table->timestamps();

            // AGGIUNGO LE RELAZIONI

            $table->foreign('post_id')
                // NOME DELLA COLONNA
                ->references('id')
                // NOME DELLA TABELLA
                ->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_posts');
    }
}
