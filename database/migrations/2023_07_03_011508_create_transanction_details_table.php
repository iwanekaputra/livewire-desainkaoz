<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransanctionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transanction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->nullable();
            $table->foreignId('upload_product_design_id')->nullable();
            $table->string('code')->nullable();
            $table->string('price')->nullable();
            $table->string('size')->nullable();
            $table->string('quantity')->nullable();
            $table->string('color')->nullable();
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
        Schema::dropIfExists('transanction_details');
    }
}
