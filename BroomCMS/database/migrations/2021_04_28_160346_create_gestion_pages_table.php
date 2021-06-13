<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('gabarit_id')->nullable()->index('gabarit_fk_2357574');
            $table->unsignedInteger('parent_id')->nullable()->index('parent_fk_2357806');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestion_pages');
    }
}
