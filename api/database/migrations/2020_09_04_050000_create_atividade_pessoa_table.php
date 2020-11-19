<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_atividades_pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('dt_periodo')
                ->comment('Determina a semana(Periodo) em que a atividade foi realizada junto com a pessoa');

            $table->integer('atividade_id')->comment('Relacionamento com o codigo da atividade');
            $table->foreign('atividade_id')->references('id')->on('tb_atividades');

            $table->integer('pessoa_id')->comment('Relacionamento com o codigo da pessoa');
            $table->foreign('pessoa_id')->references('id')->on('tb_pessoas');

            $table->softDeletes();
            $table->timestamps();

            $table->index([
                'atividade_id',
                'pessoa_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_atividades_pessoas');
    }
}
