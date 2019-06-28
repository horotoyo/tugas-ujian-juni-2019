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
            $table->bigIncrements('id');
            $table->string('isbn', 50);
            $table->unsignedBigInteger('category_id');
            $table->string('title', 50);
            $table->text('description');
            $table->string('author', 50);
            $table->string('publisher', 50);
            $table->string('print', 10);
            $table->date('date_rilies')->nullable();
            $table->string('place_rilies')->nullable();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
