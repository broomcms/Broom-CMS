<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGabaritItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gabarit_item', function (Blueprint $table) {
            $table->foreign('gabarit_id', 'gabarit_id_fk_2357559')->references('id')->on('gabarits')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('item_id', 'item_id_fk_2357559')->references('id')->on('items')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gabarit_item', function (Blueprint $table) {
            $table->dropForeign('gabarit_id_fk_2357559');
            $table->dropForeign('item_id_fk_2357559');
        });
    }
}
