<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigGabaritTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_gabarit', function (Blueprint $table) {
            $table->unsignedInteger('config_id')->index('config_id_fk_2357790');
            $table->unsignedInteger('gabarit_id')->index('gabarit_id_fk_2357790');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_gabarit');
    }
}
