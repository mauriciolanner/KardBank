<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependant extends Model
{
    protected $fillable = [
        'registration',
        'account',
        'name',
        'CPF',
        'subsidiary_id'
    ];
    use HasFactory;
    use SoftDeletes;

    public function titulosSaida()
    {
        return $this->hasMany(TitleOut::class);
    }

    public function titulosRetorno()
    {
        return $this->hasMany(TitleReturn::class);
    }

    public function filial()
    {
        return $this->belongsTo(Subsidiary::class, 'subsidiary_id');
    }
}
