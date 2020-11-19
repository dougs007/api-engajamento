<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_nome', 200);
            $table->date('dt_nascimento');
            $table->string('nu_telefone', 15)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email', 120)->unique();
            $table->string('password', 255);
            $table->enum('bol_ativo', array('A', 'I', 'B'))->default('A');
            $table->integer('deleted_id')->nullable()
                ->comment('ID do usuário que removeu o registro');

            $table->integer('lider_id')->nullable()->comment('Autorelacionamento de líderes');
            $table->foreign('lider_id')->references('id')->on('users');

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
