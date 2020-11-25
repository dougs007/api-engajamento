<?php

use Illuminate\Database\Seeder;
use App\Entity\Activity;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Activity
        Activity::create(['tx_nome' => 'Mensagem', 'dt_dia' => '2020-09-07 19:00:00']);
        Activity::create(['tx_nome' => 'Ligação',  'dt_dia' => '2020-09-08 20:30:00']);
        Activity::create(['tx_nome' => 'Visita',   'dt_dia' => '2020-09-09 19:30:00']);
        Activity::create(['tx_nome' => 'Célula',   'dt_dia' => '2020-09-10 17:00:00']);
        Activity::create(['tx_nome' => 'Culto',    'dt_dia' => '2020-09-11 18:00:00']);
        Activity::create(['tx_nome' => 'Oração',   'dt_dia' => '2020-09-12 18:00:00']);
    }
}
