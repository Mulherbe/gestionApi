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
            $table->foreign('parent_id')->references('id')->on('Categories')->onDelete('cascade');
        });
        Schema::table('clouds', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            ;
            $table->foreign('id_category')->references('id')->on('Categories')->onDelete('cascade');
            ;
            
        });
        Schema::table('todos', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('Categories');
        });
        Schema::table('projects', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('Categories')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
        });
        Schema::table('clients', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('wallpapers', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('notes', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('Categories')->onDelete('cascade');
        });
        Schema::table('costs', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');.
            
            $table->foreign('id_category')->references('id')->on('Categories')->onDelete('cascade');
        });
        Schema::table('subscriptions', function(Blueprint $table) {
            $table->foreign('id_cost')->references('id')->on('costs')->onDelete('cascade');
        });
        Schema::table('calendars', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('settings', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('wallets', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
