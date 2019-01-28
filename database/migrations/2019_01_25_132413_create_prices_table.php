<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //struktura tabeli prices
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->decimal("price_netto", 6, 2);
            $table->decimal("price_brutto", 6, 2);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //usuniecie tabeli jesli istnieje
        Schema::dropIfExists('prices');
    }
}
