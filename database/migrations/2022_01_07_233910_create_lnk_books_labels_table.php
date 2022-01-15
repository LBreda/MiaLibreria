<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLnkBooksLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnk_books_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('label_id');
            $table->timestamps();
        });
        Schema::table('lnk_books_labels', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('label_id')->references('id')->on('labels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lnk_books_labels', function (Blueprint $table) {
            $table->dropForeign('lnk_books_labels_book_id_foreign');
            $table->dropForeign('lnk_books_labels_label_id_foreign');
        });
        Schema::dropIfExists('lnk_books_labels');
    }
}
