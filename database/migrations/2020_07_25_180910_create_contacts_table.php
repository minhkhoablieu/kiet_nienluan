<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name');
            $table->string('phone');
            $table->string('title');
            $table->string('email');
            $table->string('content');
            $table->boolean('active')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->timestampTz('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
