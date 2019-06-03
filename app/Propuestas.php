<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuestas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'propuestas_gasto';

    protected $fillable = [
        'cif', 'shortdescription', 'description', 'type', 'totalamount', 'spentamount', 'owner',
        'objeto', 'facturacion', 'finishdate',
    ];

    public function prettyType()
    {
        switch ($this->type) {
            case '1':
                return 'Obras';
                break;

            case '2':
                return 'Servicios';
                break;

            case '3':
                return 'Suministros';
                break;

        }
    }

    public function tercero()
    {
        return $this->belongsTo(Terceros::class, 'cif', 'cif');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner', 'id');
    }

    /**
     * Usuarios asignados a una propuesta
     */

    public function users()
    {
        return $this->belongsToMany(User::class, 'propuestas_users');
    }

    public function addAmount($amount)
    {
        if (($amount + $this->spentamount) > $this->totalamount || $amount <= 0) {
            return false;
        } else {
            $this->spentamount += $amount;

            $this->save();

            return true;
        }
    }
}
