<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_product_tag', function (Blueprint $table) {
            $table->foreign('product_id', 'product_id_fk_2357361')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('product_tag_id', 'product_tag_id_fk_2357361')->references('id')->on('product_tags')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_product_tag', function (Blueprint $table) {
            $table->dropForeign('product_id_fk_2357361');
            $table->dropForeign('product_tag_id_fk_2357361');
        });
    }
}
