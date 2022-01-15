<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('identifier_type_id');
            $table->string('identifier');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('identifiers', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('identifier_type_id')->references('id')->on('identifier_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('identifiers', function (Blueprint $table) {
            $table->dropForeign('identifiers_book_id_foreign');
            $table->dropForeign('identifiers_identifier_type_id_foreign');
        });
        Schema::dropIfExists('identifiers');
    }
}
