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
            $table->timestamps();
            $table->boolean('showClient')->nullable();
            $table->boolean('showProject')->nullable();
            $table->boolean('showTodo')->nullable();
            $table->boolean('showCloud')->nullable();
            $table->boolean('showNote')->nullable();
            $table->boolean('showCost')->nullable();
            $table->boolean('showWallets')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('id_user');
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
