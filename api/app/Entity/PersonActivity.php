<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class PersonActivity extends Model
{
    Use SoftDeletes;
    protected $table = 'tb_atividades_pessoas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dt_periodo', 'atividade_id', 'pessoa_id'
    ];
}
