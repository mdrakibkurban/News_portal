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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('sub_categories')
            ->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('subdistrict_id')->nullable()->constrained('sub_districts')
            ->onDelete('cascade');
            $table->string('news_en');
            $table->string('news_bn');
            $table->string('image');
            $table->longText('des_en');
            $table->longText('des_bn');
            $table->string('tags_en')->nullable();
            $table->string('tags_bn')->nullable();
            $table->tinyInteger('status');
            $table->integer('headline')->nullable();
            $table->integer('first_section_big')->nullable();
            $table->integer('first_section_small')->nullable();
            $table->integer('others_section_big')->nullable();
            $table->integer('others_section_small')->nullable();
            $table->string('news_date')->nullable();
            $table->string('news_month')->nullable();
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
        Schema::dropIfExists('news');
    }
};
