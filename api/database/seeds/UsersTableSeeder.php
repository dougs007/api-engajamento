<?php

use Illuminate\Database\Seeder;
use App\Entity\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Líderes/Usuários
        $user = User::create([
            "tx_nome"       => "Admin Engajamento",
            "email"         => "admin@admin.com",
            "nu_ddd"        => "61",
            "nu_telefone"   => "984422737",
            "password"      => bcrypt(123),
            "dt_nascimento" => "1991-01-01",
            "bol_ativo"     => "A",
            "perfil_id"     => 1,
        ]);

        User::create([
            "tx_nome"       => "Daniel",
            "email"         => "daniel@gmail.com",
            "nu_ddd"        => "61",
            "nu_telefone"   => "984422737",
            "password"      => bcrypt(123),
            "dt_nascimento" => "1992-05-23",
            "bol_ativo"     => "A",
            "lider_id"      => $user->id,
            "perfil_id"     => 2,
        ]);
    }
}
