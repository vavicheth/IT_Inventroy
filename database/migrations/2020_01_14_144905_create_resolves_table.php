<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->dateTime('start_date');
            $table->dateTime('receive_date');
            $table->dateTime('resolve_date')->nullable();
            $table->string('solution')->nullable();
            $table->string('description')->nullable();
            $table->char('status')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolves');
    }
}
