<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terceros extends Model
{
    protected $fillable = [
        'cif', 'name',
    ];

    public function propuestas()
    {
        return $this->hasMany(Propuestas::class, 'cif', 'cif');
    }
}
