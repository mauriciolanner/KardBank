<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitleReturn extends Model
{
    protected $fillable = [
        'desconto_previsto',
        'desconto_realizado',
        'estabelecimento',
        'cod_desconto',
        'orgao',
        'periodo',
        'operacao',
        'competencia',
        'status',
        'associada',
        'dependant_id'
    ];
    use HasFactory;
    use SoftDeletes;

    public function mediacao()
    {
        return $this->hasOne(Dependant::class);
    }

    public function servidor()
    {
        return $this->belongsTo(Dependant::class, 'dependant_id');
    }
}
