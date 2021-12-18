<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_companies', function (Blueprint $table) {
            $table->id();
            $table->string('title_1_uz')->nullable();
            $table->string('title_1_ru')->nullable();
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
        Schema::dropIfExists('about_companies');
    }
}
