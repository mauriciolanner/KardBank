<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_outs', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 8, 2);
            $table->string('estabelecimento');
            $table->string('orgao');
            $table->string('cod_desconto');
            $table->string('prazo_total');
            $table->string('competencia');
            $table->string('operacao');
            $table->string('associada');
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
        Schema::dropIfExists('title_outs');
    }
}
