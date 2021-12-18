<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrowthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('growths', function (Blueprint $table) {
            $table->id();
            $table->longText('title_1_uz')->nullable();
            $table->longText('title_1_ru')->nullable();
            $table->longText('title_2_uz')->nullable();
            $table->longText('title_2_ru')->nullable();
            $table->longText('text_uz')->nullable();
            $table->longText('text_ru')->nullable();
         

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
        Schema::dropIfExists('growths');
    }
}
