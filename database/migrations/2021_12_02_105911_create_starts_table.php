<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starts', function (Blueprint $table) {
            $table->id();
            $table->longText('title_1_uz')->nullable();
            $table->longText('title_1_ru')->nullable();
            $table->longText('title_2_uz')->nullable();
            $table->longText('title_2_ru')->nullable();
            $table->longText('text_uz')->nullable();
            $table->longText('text_ru')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('starts');
    }
}
