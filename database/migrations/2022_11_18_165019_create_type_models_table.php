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
        Schema::create('type_models', function (Blueprint $table) {
            $table->id();
            $table->string('name',120);
            $table->date('creation_date');
            $table->foreignId('manufacturer_id', 'FK_TYPE_MODEL_MANUFACTURE')
                  ->references('id')
                  ->on('manufacturers');
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
        Schema::dropIfExists('type_models');
    }
};
