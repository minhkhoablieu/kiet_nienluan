<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->smallInteger('id', true);
            $table->string('name');
            $table->string('image');
            $table->boolean('active')->default(1);
            $table->string('website')->nullable();
            $table->timestamps();
            $table->timestampTz('deleted_at')->nullable();
            $table->smallInteger('order')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
