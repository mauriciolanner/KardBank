<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitleOut extends Model
{
    protected $fillable = [
        'value',
        'estabelecimento',
        'orgao',
        'cod_desconto',
        'prazo_total',
        'competencia',
        'operacao',
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
