<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Associated extends Model
{
    protected $fillable = [
        'code',
        'name',
        'cnpj',
        'contract_id'
    ];
    use HasFactory;
    use SoftDeletes;

    public function filial()
    {
        return $this->hasMany(Subsidiary::class);
    }

    public function contrato()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
}
