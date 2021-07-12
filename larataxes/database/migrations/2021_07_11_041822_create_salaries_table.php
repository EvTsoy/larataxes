<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->decimal('oklad');
            $table->integer('norma_in_month');
            $table->integer('otrabotano_days');
            $table->boolean('nalog_vichet');
            $table->integer('calendar_god');
            $table->integer('calendar_month');
            $table->boolean('is_pensioner');
            $table->integer('is_disabled_person');
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
        Schema::dropIfExists('salaries');
    }
}
