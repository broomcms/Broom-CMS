<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabaritItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabarit_item', function (Blueprint $table) {
            $table->unsignedInteger('gabarit_id')->index('gabarit_id_fk_2357559');
            $table->unsignedInteger('item_id')->index('item_id_fk_2357559');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gabarit_item');
    }
}
