<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conciliation extends Model
{
    protected $fillable = [
        'saldo',
        'motivo',
        'competencia',
        'status',
        'associada',
        'title_return_id',
        'title_out_id'
    ];
    use HasFactory;
    use SoftDeletes;

    public function tituloSaida()
    {
        return $this->belongsTo(TitleOut::class, 'title_out_id');
    }

    public function tituloRetorno()
    {
        return $this->belongsTo(TitleOut::class, 'title_return_id');
    }
}
