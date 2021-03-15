<?php

namespace App\Repositories;

use App\Entity\{Activity, HelpedPerson, PersonActivity};
use App\Repositories\Contracts\PersonActivityRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PersonActivityRepository implements PersonActivityRepositoryInterface
{
    protected $entity;

    public function __construct(PersonActivity $personActivity)
    {
        $this->entity = $personActivity;
    }

    public function createReview(array $data)
    {
        return $this->entity->create($data);
    }

    public function findReviewById(int $id)
    {
        return $this->entity
            ->find($id);
    }

    public function deleteReview(int $id)
    {
        return $this->entity
            ->find($id)
            ->forceDelete();
    }

    public function getRegimentation(array $data)
    {
        $retorno = array();
        $dt_begin = $data['dt_begin'];
        $dt_until = $data['dt_until'];
        $lider_id = auth()->user()->id;
        $pessoas = HelpedPerson::where('lider_id', $lider_id)->get()->toArray();

        foreach ((array)$pessoas as $pessoa) {
            $retorno['helpedPerson'][$pessoa['id']] = $pessoa;
            # filtra as Atividades verificando se foi realizada a "chamada";
            $atividades = Activity::select(
                DB::raw("
                    (
                        SELECT id
                        FROM tb_atividades_pessoas
                        WHERE
                            deleted_at IS NULL
                            AND atividade_id = tb_atividades.id
                            AND pessoa_id = " . $pessoa['id'] . "
                            AND dt_periodo BETWEEN '{$dt_begin}'
                            AND '{$dt_until}'
                        LIMIT 1
                    ) AS thumbsup"
                ),
                "tb_atividades.id",
                "tb_atividades.tx_nome",
                "tb_atividades.dt_dia"
            )
                ->orderBy("tb_atividades.dt_dia", 'ASC')
                ->get();

            foreach($atividades as $atividade) {
                if (is_int($atividade["thumbsup"])) {
                    $atividade["reviewId"] = $atividade["thumbsup"];
                    $atividade["thumbsup"] = !!$atividade["thumbsup"];
                } else {
                    $atividade["thumbsup"] = !!$atividade["thumbsup"];
                    $atividade["reviewId"] = 0;
                }
                $retorno['helpedPerson'][$pessoa['id']]['atividade'][] = $atividade;
            }
        }

        # Busca Atividades
        $retorno['activities'][] = Activity::orderBy('dt_dia', 'ASC')->get();

        # Busca Dado para Totalizador
        $retorno['counter'] = DB::table("tb_atividades_pessoas as p")
            ->join("tb_pessoas as tp", function ($join) use ($lider_id) {
                $join->on("p.pessoa_id", '=', "tp.id");
                $join->on("lider_id", '=', DB::raw($lider_id));
            })
            ->select(DB::raw('count(p.atividade_id) as count_atividades, p.atividade_id'))
            ->whereBetween(DB::raw("to_char(dt_periodo, 'YYYY-MM-DD')"), [$dt_begin, $dt_until])
            ->groupBy("p.atividade_id")
            ->get();

        return $retorno;
    }
}
