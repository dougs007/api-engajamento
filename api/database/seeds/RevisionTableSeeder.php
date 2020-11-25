<?php

use Illuminate\Database\Seeder;
use App\Entity\Revision;

class RevisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Revisão de Vidas
        Revision::create(['dt_revisao' => '2020-08-20']);
        Revision::create(['dt_revisao' => '2020-10-20']);
    }
}
