<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];
    use HasFactory;
    use SoftDeletes;

    public function filiais()
    {
        return $this->hasMany(Subsidiary::class);
    }
}
