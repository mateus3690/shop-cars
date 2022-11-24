<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->float('price');
            $table->text('description')->nullable();
            $table->boolean('published');

            $table->foreignId('user_id', 'FK_PRODUCT_USER')
                  ->references('id')
                  ->on('users');

            $table->foreignId('category_id', 'FK_PRODUCT_CATEGORY')
                  ->references('id')
                  ->on('categories');

            $table->foreignId('type_model_id', 'FK_PRODUCT_TYPE_MODEL')
                  ->references('id')
                  ->on('type_models');

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
};
