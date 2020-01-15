<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('detail')->nullable();
            $table->string('function')->nullable();
            $table->string('ip_address')->nullable();
            $table->date('buy_date')->nullable();
            $table->string('description')->nullable();
            $table->char('active')->default('1');
            $table->integer('department_it')->unsigned();
            $table->integer('category_it')->unsigned();
            $table->integer('software_it')->unsigned();
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
        Schema::dropIfExists('items');
    }
}
