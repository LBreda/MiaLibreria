<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('original_title')->nullable();
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('original_language_id');
            $table->date('published_date')->nullable();
            $table->text('description')->nullable();
            $table->json('meta_json')->default('{}');
            $table->unsignedBigInteger('publisher_id');
            $table->timestamps();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('language_id')->references('id')->on('ldb_languages');
            $table->foreign('original_language_id')->references('id')->on('ldb_languages');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_user_id_foreign');
            $table->dropForeign('books_publisher_id_foreign');
            $table->dropForeign('books_language_id_foreign');
            $table->dropForeign('books_original_language_id_foreign');
        });
        Schema::dropIfExists('books');
    }
}
