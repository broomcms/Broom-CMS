<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserUserAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_user_alert', function (Blueprint $table) {
            $table->foreign('user_alert_id', 'user_alert_id_fk_2357382')->references('id')->on('user_alerts')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id', 'user_id_fk_2357382')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_user_alert', function (Blueprint $table) {
            $table->dropForeign('user_alert_id_fk_2357382');
            $table->dropForeign('user_id_fk_2357382');
        });
    }
}
