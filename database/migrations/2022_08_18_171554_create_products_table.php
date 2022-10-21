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
            $table->id();
            $table->unsignedBigInteger('cat_id');
            // $table->unsignedBigInteger('subcat_id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('small_description');
            $table->text('description');
            $table->integer('regular_price');
            $table->integer('seller_price');
            $table->string('product_quantity');
            $table->string('cover')->nullable();
            $table->string('hover')->nullable();
            $table->string('images')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('cat_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            // $table->foreign('subcat_id')
            //       ->references('id')
            //       ->on('sub_categories')
            //       ->onDelete('cascade');

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
