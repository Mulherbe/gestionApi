<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Categories', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('Categories');
        });
        Schema::table('clouds', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('Categories');
        });
        Schema::table('todos', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('Categories');
        });
        Schema::table('projects', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('Categories');
            $table->foreign('id_client')->references('id')->on('clients');
        });
        Schema::table('clients', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('wallpapers', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('notes', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('Categories');
        });
        Schema::table('costs', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('Categories');
        });
        Schema::table('subscriptions', function(Blueprint $table) {
            $table->foreign('id_cost')->references('id')->on('costs');
        });
        Schema::table('calendars', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('settings', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('wallets', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_foreign_keys');
    }
}
