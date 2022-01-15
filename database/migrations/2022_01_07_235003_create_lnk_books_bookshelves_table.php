<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLnkBooksBookshelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnk_books_bookshelves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('bookshelf_id');
            $table->string('column');
            $table->string('row');
            $table->timestamps();
        });
        Schema::table('lnk_books_bookshelves', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('bookshelf_id')->references('id')->on('bookshelves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lnk_books_bookshelves', function (Blueprint $table) {
            $table->dropForeign('lnk_books_bookshelves_book_id_foreign');
            $table->dropForeign('lnk_books_bookshelves_bookshelf_id_foreign');
        });
        Schema::dropIfExists('lnk_books_bookshelves');
    }
}
