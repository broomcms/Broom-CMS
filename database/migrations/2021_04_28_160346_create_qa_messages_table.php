<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQaMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qa_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('topic_id')->index('qa_messages_topic_id_foreign');
            $table->unsignedInteger('sender_id')->index('qa_messages_sender_id_foreign');
            $table->timestamp('read_at')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('qa_messages');
    }
}
