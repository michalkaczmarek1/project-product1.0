<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //struktura tabeli products
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", 150);
            $table->text("description");
            
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
        Schema::dropIfExists('products');
    }
}
