<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadProductDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_product_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('design_category_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('product_design_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('tags')->nullable();
            $table->string('url')->nullable();
            $table->string('price_design')->nullable();
            $table->string('total_price')->nullable();
            $table->string('sold')->nullable();
            $table->longText('image')->nullable();
            $table->boolean('is_approved')->nullable();
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
        Schema::dropIfExists('upload_product_designs');
    }
}
