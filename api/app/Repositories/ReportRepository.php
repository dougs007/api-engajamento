<?php

namespace App\Repositories;

use App\Entity\User;
use App\Repositories\Contracts\ReportRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ReportRepository implements ReportRepositoryInterface
{
//    protected $entity;

/*    public function __construct(Activity $activity)
    {
        $this->entity = $activity;
    }*/

    public function leadersThatHaveDone()
    {
        $params = [
            "initial_date" => "2021-02-15",
            "final_date" => "2021-02-21",
        ];
        $reportLeadersThatHaveDone = DB::table('users as u')
            ->selectRaw("
                u.id,
                u.tx_nome,
                SUM(CASE WHEN ap.atividade_id = 1 THEN 1 ELSE 0 END) as qtdRevisionista,
                SUM(CASE WHEN ap.atividade_id = 2 THEN 1 ELSE 0 END) as qtdNomes,
                SUM(CASE WHEN ap.atividade_id = 3 THEN 1 ELSE 0 END) as qtdMensagens,
                SUM(CASE WHEN ap.atividade_id = 4 THEN 1 ELSE 0 END) as qtdLigacoes,
                SUM(CASE WHEN ap.atividade_id = 5 THEN 1 ELSE 0 END) as qtdVisitas,
                SUM(CASE WHEN ap.atividade_id = 6 THEN 1 ELSE 0 END) as qtdRevisao
            ")
            ->join("tb_pessoas p", function($join) {
                $join->on("u.id", "=",  "p.lider_id");
                $join->on("p.deleted_at", "=", "NULL");
            })
            ->join("tb_atividades_pessoas ap", function($join) use ($params) {
                $join->on("p.id", "=", "ap.pessoa_id");
                $join->on("ap.deleted_at", "=", "NULL");
                $join->on(DB::raw("TO_CHAR(dt_periodo, 'YYYY-MM-DD')", "BETWEEN", "'{$params['initial_date']}'
                    AND '{$params['final_date']}')")
                );
            })
            ->where("u.bol_ativo", "=", "A")
            ->where("u.deleted_at", "=", "NULL")
            ->groupBy("u.id", "u.tx_nome")
            ->havingRaw("
                	SUM(CASE WHEN ap.atividade_id = 1 THEN 1 ELSE 0 END) = 1
                    AND SUM(CASE WHEN ap.atividade_id = 2 THEN 1 ELSE 0 END) = 1
                    AND SUM(CASE WHEN ap.atividade_id = 3 THEN 1 ELSE 0 END) = 4
                    AND SUM(CASE WHEN ap.atividade_id = 4 THEN 1 ELSE 0 END) = 4
                    AND SUM(CASE WHEN ap.atividade_id = 5 THEN 1 ELSE 0 END) = 2
                    AND SUM(CASE WHEN ap.atividade_id = 6 THEN 1 ELSE 0 END) = 1
            ")
//            ->toSql();
            ->get();

        return $reportLeadersThatHaveDone;
    }

    public function leadersThatHaveDont()
    {
        // TODO: Implement leadersThatHaveDont() method.
    }

    public function leadersThatHaveDouble()
    {
        // TODO: Implement leadersThatHaveDouble() method.
    }

    public function leadersThatHaveTripleOrMore()
    {
        // TODO: Implement leadersThatHaveTripleOrMore() method.
    }
}
