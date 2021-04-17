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
            $table->bigInteger('id', true);
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->text('content');
            $table->integer('amount')->default(0);
            $table->integer('price')->default(0);
            $table->boolean('active')->default(1);
            $table->bigInteger('user_id');
            $table->timestamps();
            $table->timestampTz('deleted_at')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
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
