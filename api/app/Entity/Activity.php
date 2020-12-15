<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Activity extends Model
{
    Use SoftDeletes;
    protected $table = 'tb_atividades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'dt_dia', 'deleted_id'
    ];
}
