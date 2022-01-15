<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLnkBooksSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnk_books_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('serie_id');
            $table->unsignedInteger('order_no');
            $table->timestamps();
        });
        Schema::table('lnk_books_series', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('serie_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lnk_books_series', function (Blueprint $table) {
            $table->dropForeign('lnk_books_series_book_id_foreign');
            $table->dropForeign('lnk_books_series_serie_id_foreign');
        });
        Schema::dropIfExists('lnk_books_series');
    }
}
