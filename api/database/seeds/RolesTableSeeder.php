<?php

use Illuminate\Database\Seeder;
use App\Entity\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Líderes/Usuários
        Roles::create(["id" => Roles::ADMIN, "tx_nome" => "Administrador"]);
        Roles::create(["id" => Roles::LEADER, "tx_nome" => "Líder"]);
    }
}
