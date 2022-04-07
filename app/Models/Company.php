<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    protected $fillable = [
        'code',
        'name',
        'cnpj'
    ];
    use HasFactory;
    use SoftDeletes;

    public function filiais()
    {
        return $this->hasMany(Subsidiary::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Company::class);
    }
}
