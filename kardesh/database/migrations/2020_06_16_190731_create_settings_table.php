<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->char('image1', 255)->nullable();
            $table->char('image2', 255)->nullable();
            $table->char('image3', 255)->nullable();
            $table->char('image4', 255)->nullable();
            $table->char('image5', 255)->nullable();
            $table->char('image6', 255)->nullable();
            $table->char('image7', 255)->nullable();
            $table->char('image8', 255)->nullable();
            $table->char('video', 255)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
