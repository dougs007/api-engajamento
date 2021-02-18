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
        Activity::create(['tx_nome' => '1-Nome', 'dt_dia' => '2020-09-07 19:00:00']);
        Activity::create(['tx_nome' => '4-Pessoas', 'dt_dia' => '2020-09-08 20:30:00']);
        Activity::create(['tx_nome' => '4-Mensagens', 'dt_dia' => '2020-09-09 19:30:00']);
        Activity::create(['tx_nome' => '4-Ligações', 'dt_dia' => '2020-09-10 17:00:00']);
        Activity::create(['tx_nome' => '2-Visitas', 'dt_dia' => '2020-09-11 18:00:00']);
        Activity::create(['tx_nome' => '1-Revisão', 'dt_dia' => '2020-09-12 18:00:00']);
    }
}
