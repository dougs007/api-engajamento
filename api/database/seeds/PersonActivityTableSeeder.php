<?php

use Illuminate\Database\Seeder;
use App\Entity\PersonActivity;

class PersonActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # (Thumbs Up) Atividades realizadas com Pessoas Ajudadas
        PersonActivity::create([
            'pessoa_id' => '2',
            'atividade_id' => '2',
            'dt_periodo' => '2020-10-05 09:10:30'
        ]);
        PersonActivity::create([
            'pessoa_id' => '2',
            'atividade_id' => '5',
            'dt_periodo' => '2020-10-06 09:10:30',
        ]);
        PersonActivity::create([
            'pessoa_id' => '2',
            'atividade_id' => '3',
            'dt_periodo' => '2020-10-07 09:10:30',
        ]);
        PersonActivity::create([
            'pessoa_id' => '1',
            'atividade_id' => '1',
            'dt_periodo' => '2020-10-07 09:10:30',
        ]);
        PersonActivity::create([
            'pessoa_id' => '1',
            'atividade_id' => '3',
            'dt_periodo' => '2020-10-08 09:10:30',
        ]);
        PersonActivity::create([
            'pessoa_id' => '3',
            'atividade_id' => '3',
            'dt_periodo' => '2020-10-08 09:10:30',
        ]);
        PersonActivity::create([
            'pessoa_id' => '3',
            'atividade_id' => '5',
            'dt_periodo' => '2020-10-08 09:10:30',
        ]);
    }
}
