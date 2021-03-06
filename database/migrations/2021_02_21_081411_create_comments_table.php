<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');

            $table->string('author', 30);
            $table->text('text', 7);

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
        Schema::dropIfExists('comments');
    }
}
