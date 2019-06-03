<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas_gasto', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner');
            $table->string('cif');
            $table->tinyInteger('type');
            $table->unsignedSmallInteger('totalamount');
            $table->unsignedSmallInteger('spentamount')->default(0);
            $table->tinyInteger('facturacion')->nullable();
            $table->string('shortdescription', 250);
            $table->string('objeto', 250)->nullable();
            $table->string('description', 1000)->nullable();
            $table->timestamp('finishdate')->nullable();
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('users');
            $table->foreign('cif')->references('cif')->on('terceros');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propuestas_gasto');
    }
}
