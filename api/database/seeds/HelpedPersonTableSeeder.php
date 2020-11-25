<?php

use Illuminate\Database\Seeder;
use App\Entity\HelpedPerson;

class HelpedPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pessoas Ajudadas
        HelpedPerson::create([
            'tx_nome'       => 'João',
            'dt_nascimento' => '2001-02-25',
            'nu_ddd'        => '61',
            'nu_telefone'   => '99293-2527',
            'lider_id'      => '1'
        ]);

        HelpedPerson::create([
            'tx_nome'       => 'Maria',
            'dt_nascimento' => '2002-09-14',
            'nu_ddd'        => '61',
            'nu_telefone'   => '987733020',
            'lider_id'      => '1'
        ]);

        HelpedPerson::create([
            'tx_nome'       => 'José',
            'dt_nascimento' => '2003-12-25',
            'nu_ddd'        => '61',
            'nu_telefone'   => '992385779',
            'lider_id'      => '1'
        ]);

        HelpedPerson::create([
            'tx_nome'       => 'Marcos',
            'dt_nascimento' => '2002-08-05',
            'nu_ddd'        => '61',
            'nu_telefone'   => '984499552',
            'lider_id'      => '1'
        ]);

        HelpedPerson::create([
            'tx_nome'       => 'Patricia',
            'dt_nascimento' => '2005-03-28',
            'nu_ddd'        => '61',
            'nu_telefone'   => '984572551',
            'lider_id'      => '2'
        ]);

        HelpedPerson::create([
            'tx_nome'       => 'Aline',
            'dt_nascimento' => '2001-09-05',
            'nu_ddd'        => '61',
            'nu_telefone'   => '992372881',
            'lider_id'      => '2'
        ]);

        HelpedPerson::create([
            'tx_nome'       => 'Roberto',
            'dt_nascimento' => '2005-11-19',
            'nu_ddd'        => '61',
            'nu_telefone'   => '984422737',
            'lider_id'      => '2'
        ]);
    }
}
