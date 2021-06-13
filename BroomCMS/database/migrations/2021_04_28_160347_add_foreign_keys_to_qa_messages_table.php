<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQaMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qa_messages', function (Blueprint $table) {
            $table->foreign('sender_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('topic_id')->references('id')->on('qa_topics')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qa_messages', function (Blueprint $table) {
            $table->dropForeign('qa_messages_sender_id_foreign');
            $table->dropForeign('qa_messages_topic_id_foreign');
        });
    }
}
