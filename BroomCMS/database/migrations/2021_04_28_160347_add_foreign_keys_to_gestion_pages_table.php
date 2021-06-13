<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGestionPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gestion_pages', function (Blueprint $table) {
            $table->foreign('gabarit_id', 'gabarit_fk_2357574')->references('id')->on('gabarits')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('parent_id', 'parent_fk_2357806')->references('id')->on('gestion_pages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gestion_pages', function (Blueprint $table) {
            $table->dropForeign('gabarit_fk_2357574');
            $table->dropForeign('parent_fk_2357806');
        });
    }
}
