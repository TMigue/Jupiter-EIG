<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cif')->unique();
            $table->string('name');
            $table->string('direction')->nullable();
            $table->unsignedInteger('tel')->unique();
            $table->unsignedInteger('maxobras')->default(30000);
            $table->unsignedInteger('maxservicios')->default(10000);
            $table->unsignedInteger('maxsuministros')->default(10000);
            $table->string('email')->unique();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('terceros');
    }
}
