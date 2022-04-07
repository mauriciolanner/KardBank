<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciliations', function (Blueprint $table) {
            $table->id();
            $table->decimal('saldo', 8, 2);
            $table->string('motivo');
            $table->string('competencia');
            $table->string('status');
            $table->string('associada');
            $table->unsignedBigInteger('title_return_id');
            $table->foreign('title_return_id')->references('id')->on('title_returns');
            $table->unsignedBigInteger('title_out_id');
            $table->foreign('title_out_id')->references('id')->on('title_outs');
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
        Schema::dropIfExists('conciliations');
    }
}
