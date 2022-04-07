<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_returns', function (Blueprint $table) {
            $table->id();
            $table->decimal('desconto_previsto', 8, 2);
            $table->decimal('desconto_realizado', 8, 2);
            $table->string('cod_desconto');
            $table->string('estabelecimento');
            $table->string('orgao');
            $table->string('periodo');
            $table->string('competencia');
            $table->string('associada');
            $table->string('status')->nullable();
            $table->integer('status_con')->default(0);
            $table->unsignedBigInteger('dependant_id');
            $table->foreign('dependant_id')->references('id')->on('dependants');
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
        Schema::dropIfExists('title_returns');
    }
}
