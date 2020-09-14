<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('name');
            $table->string('code');
            $table->string('price');
            $table->string('image')->default('deafault.png');
            $table->text('description');
            $table->foreign('cat_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
