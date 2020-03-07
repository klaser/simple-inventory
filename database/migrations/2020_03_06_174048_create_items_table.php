<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->nullable()->default(null);
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('quantity');
            $table->enum('status', ['active', 'inactive', 'hidden'])->default('active');
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
        Schema::dropIfExists('items');
    }
}
