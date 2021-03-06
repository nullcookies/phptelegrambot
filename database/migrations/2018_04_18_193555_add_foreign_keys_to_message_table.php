<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMessageTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message', function (Blueprint $table) {
            $table->foreign('user_id', 'message_ibfk_1')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('chat_id', 'message_ibfk_2')->references('id')->on('chat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('forward_from', 'message_ibfk_3')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('forward_from_chat', 'message_ibfk_4')->references('id')->on('chat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('reply_to_chat', 'message_ibfk_5')->references('chat_id')->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('forward_from', 'message_ibfk_6')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('left_chat_member', 'message_ibfk_7')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('message', function (Blueprint $table) {
            $table->dropForeign('message_ibfk_1');
            $table->dropForeign('message_ibfk_2');
            $table->dropForeign('message_ibfk_3');
            $table->dropForeign('message_ibfk_4');
            $table->dropForeign('message_ibfk_5');
            $table->dropForeign('message_ibfk_6');
            $table->dropForeign('message_ibfk_7');
        });
    }

}
