<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->integer('type')->after('email')->default(0);
             $table->integer('category')->after('type')->nullable();
             $table->integer('division')->after('category')->nullable();
             $table->integer('news')->after('division')->nullable();
             $table->integer('setting')->after('news')->nullable();
             $table->integer('gallery')->after('setting')->nullable();
             $table->integer('ads')->after('gallery')->nullable();
             $table->integer('role')->after('ads')->nullable();
             $table->string('image')->after('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['type','category','division','news','setting','gallery','ads','role','image']);
        });
    }
};
