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
        // Líderes/Usuários
        User::create([
            'tx_nome'       => 'Admin Engajamento',
            'email'         => 'admin@admin.com',
            'password'      => bcrypt(123),
            'dt_nascimento' => '1991-01-01',
            'bol_ativo'     => 'A',
        ]);

        User::create([
            'tx_nome'       => 'Daniel',
            'email'         => 'daniel@gmail.com',
            'password'      => bcrypt(123),
            'dt_nascimento' => '1992-05-23',
            'bol_ativo'     => 'A',
        ]);
    }
}
