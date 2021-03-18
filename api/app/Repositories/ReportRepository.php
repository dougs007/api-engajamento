<?php

namespace App\Repositories;

use App\Http\Requests\GetReportsLeaders;
use App\Repositories\Contracts\ReportRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ReportRepository implements ReportRepositoryInterface
{

    public function leadersThatHaveDone(GetReportsLeaders $request): array
    {
        return DB::select("
            SELECT
                u.id, u.tx_nome,
                SUM(CASE WHEN ap.atividade_id = 1 THEN 1 ELSE 0 END) as qtdRevisionista,
                SUM(CASE WHEN ap.atividade_id = 2 THEN 1 ELSE 0 END) as qtdNomes,
                SUM(CASE WHEN ap.atividade_id = 3 THEN 1 ELSE 0 END) as qtdMenssagens,
                SUM(CASE WHEN ap.atividade_id = 4 THEN 1 ELSE 0 END) as qtdLigacoes,
                SUM(CASE WHEN ap.atividade_id = 5 THEN 1 ELSE 0 END) as qtdVisitas,
                SUM(CASE WHEN ap.atividade_id = 6 THEN 1 ELSE 0 END) as qtdRevisao
            FROM users u
                JOIN tb_pessoas p ON u.id = p.lider_id AND p.deleted_at IS NULL
                JOIN tb_atividades_pessoas ap ON(
                    p.id = ap.pessoa_id
                    AND ap.deleted_at IS NULL
                    AND (TO_CHAR(dt_periodo, 'YYYY-MM-DD') BETWEEN '{$request['dt_begin']}' AND '{$request['dt_until']}')
                )
            WHERE
                u.bol_ativo = 'A' AND u.deleted_at IS NULL
            GROUP BY
                u.id, u.tx_nome
            HAVING
                SUM(CASE WHEN ap.atividade_id = 1 THEN 1 ELSE 0 END) >= 1
                AND SUM(CASE WHEN ap.atividade_id = 2 THEN 1 ELSE 0 END) >= 1
                AND SUM(CASE WHEN ap.atividade_id = 3 THEN 1 ELSE 0 END) >= 4
                AND SUM(CASE WHEN ap.atividade_id = 4 THEN 1 ELSE 0 END) >= 4
                AND SUM(CASE WHEN ap.atividade_id = 5 THEN 1 ELSE 0 END) >= 2
                AND SUM(CASE WHEN ap.atividade_id = 6 THEN 1 ELSE 0 END) >= 1
            ;
        ");
    }

    public function leadersThatHaventDone(GetReportsLeaders $request): array
    {
        return DB::select("
            SELECT
                u.id, u.tx_nome,
                SUM(CASE WHEN ap.atividade_id = 1 THEN 1 ELSE 0 END) as qtdRevisionista,
                SUM(CASE WHEN ap.atividade_id = 2 THEN 1 ELSE 0 END) as qtdNomes,
                SUM(CASE WHEN ap.atividade_id = 3 THEN 1 ELSE 0 END) as qtdMenssagens,
                SUM(CASE WHEN ap.atividade_id = 4 THEN 1 ELSE 0 END) as qtdLigacoes,
                SUM(CASE WHEN ap.atividade_id = 5 THEN 1 ELSE 0 END) as qtdVisitas,
                SUM(CASE WHEN ap.atividade_id = 6 THEN 1 ELSE 0 END) as qtdRevisao
            FROM users u
                JOIN tb_pessoas p ON u.id = p.lider_id AND p.deleted_at IS NULL
                JOIN tb_atividades_pessoas ap ON(
                    p.id = ap.pessoa_id
                    AND ap.deleted_at IS NULL
                    AND (TO_CHAR(dt_periodo, 'YYYY-MM-DD') BETWEEN '{$request['dt_begin']}' AND '{$request['dt_until']}')
                )
            WHERE
                u.bol_ativo = 'A' AND u.deleted_at IS NULL
            GROUP BY
                u.id, u.tx_nome
            HAVING
                SUM(CASE WHEN ap.atividade_id = 1 THEN 1 ELSE 0 END) = 0
                OR SUM(CASE WHEN ap.atividade_id = 2 THEN 1 ELSE 0 END) = 0
                OR SUM(CASE WHEN ap.atividade_id = 3 THEN 1 ELSE 0 END) = 0
                OR SUM(CASE WHEN ap.atividade_id = 4 THEN 1 ELSE 0 END) = 0
                OR SUM(CASE WHEN ap.atividade_id = 5 THEN 1 ELSE 0 END) = 0
                OR SUM(CASE WHEN ap.atividade_id = 6 THEN 1 ELSE 0 END) = 0
            ;
        ");
    }

    public function leadersThatHaveDouble(GetReportsLeaders $request): array
    {
        return [];
    }

    public function leadersThatHaveTripleOrMore(GetReportsLeaders $request): array
    {
        return [];
    }
}
