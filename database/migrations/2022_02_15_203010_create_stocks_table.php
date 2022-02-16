<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->tinyInteger('type');
            $table->integer('quantity1')->nullable();
            $table->integer('quantity2')->nullable();
            $table->integer('quantity3')->nullable();
            $table->integer('quantity4')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
