<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLnkBooksAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnk_books_authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
        });
        Schema::table('lnk_books_authors', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lnk_books_authors', function (Blueprint $table) {
            $table->dropForeign('lnk_books_authors_book_id_foreign');
            $table->dropForeign('lnk_books_authors_author_id_foreign');
        });
        Schema::dropIfExists('lnk_books_authors');
    }
}
