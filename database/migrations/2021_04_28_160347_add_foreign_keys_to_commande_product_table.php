<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommandeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commande_product', function (Blueprint $table) {
            $table->foreign('commande_id', 'commande_id_fk_2362103')->references('id')->on('commandes')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('product_id', 'product_id_fk_2362103')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commande_product', function (Blueprint $table) {
            $table->dropForeign('commande_id_fk_2362103');
            $table->dropForeign('product_id_fk_2362103');
        });
    }
}
