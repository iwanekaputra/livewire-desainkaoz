<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_design_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('product_variant_id')->nullable();
            $table->string('price_design')->nullable();
            $table->string('total_price')->nullable();
            $table->string('sumbu_x')->nullable();
            $table->string('sumbu_y')->nullable();
            $table->string('rotation')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('is_approved')->nullable();
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
        Schema::dropIfExists('product_designs');
    }
}
