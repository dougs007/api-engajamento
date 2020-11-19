<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_nome', 200);
            $table->date('dt_nascimento');
            $table->string('nu_telefone', 15)->nullable();

            $table->integer('deleted_id')->nullable()
                ->comment('ID do usuário que removeu o registro');

            $table->integer('lider_id')->comment('Relacionamento com líder da tabela users');
            $table->foreign('lider_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();

            $table->index(['id', 'lider_id', 'deleted_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pessoas');
    }
}
