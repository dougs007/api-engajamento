<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_revisoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dt_revisao');
            $table->date('dt_cadastro')->default('NOW()');

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
        Schema::dropIfExists('tb_revisoes');
    }
}
