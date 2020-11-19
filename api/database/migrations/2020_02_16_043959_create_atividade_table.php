<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_nome', 200);
            $table->dateTime('dt_dia')->default('NOW()')
                ->comment('Dia da semana e Hora de realização da atividade');
            $table->integer('deleted_id')->nullable()
                ->comment('ID do usuário que removeu o registro');

            $table->softDeletes();
            $table->timestamps();

            $table->index(['id', 'deleted_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_atividades');
    }
}
