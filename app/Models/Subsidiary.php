<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsidiary extends Model
{
    protected $fillable = [
        'code',
        'name',
        'cnpj',
        'associated_id'
    ];
    use HasFactory;
    use SoftDeletes;

    public function servidores()
    {
        return $this->hasMany(Dependant::class);
    }

    public function associada()
    {
        return $this->belongsTo(Associated::class, 'associated_id');
    }
}
