<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_product_category', function (Blueprint $table) {
            $table->foreign('product_category_id', 'product_category_id_fk_2357360')->references('id')->on('product_categories')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('product_id', 'product_id_fk_2357360')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_product_category', function (Blueprint $table) {
            $table->dropForeign('product_category_id_fk_2357360');
            $table->dropForeign('product_id_fk_2357360');
        });
    }
}
