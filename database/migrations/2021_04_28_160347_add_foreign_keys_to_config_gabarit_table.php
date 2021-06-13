<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToConfigGabaritTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_gabarit', function (Blueprint $table) {
            $table->foreign('config_id', 'config_id_fk_2357790')->references('id')->on('configs')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('gabarit_id', 'gabarit_id_fk_2357790')->references('id')->on('gabarits')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_gabarit', function (Blueprint $table) {
            $table->dropForeign('config_id_fk_2357790');
            $table->dropForeign('gabarit_id_fk_2357790');
        });
    }
}
