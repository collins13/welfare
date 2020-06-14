<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->char('plan', 255);
            $table->char('email', 255);
            $table->char('amount', 255);
            $table->integer('cat_id')->unsigned();
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donates');
    }
}
