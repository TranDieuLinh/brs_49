<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->foreign('category')->references('name')->on('categories');
            $table->string('author_name');
            $table->foreign('author_name')->references('author_name')->on('authors');
            $table->string('title');
            $table->text('description');
            $table->integer('number_of_page');
            $table->string('image');
            $table->string('publisher');
            $table->date('date_published');
            $table->integer('rate');
            $table->integer('rate_count');
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
        Schema::dropIfExists('books');
    }
}
