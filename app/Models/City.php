<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    // Atributos que se pueden asignar masivamente
    protected $primaryKey = 'idcity';
    protected $fillable = [
        'idcity',
        'nombre',
        'nivel',
        'playerid',
        'islaid',
        'update',
        'server',
    ];

    // Relación con el jugador
    public function player()
    {
        return $this->belongsTo(Player::class, 'playerid');
    }

    // Relación con la isla
    public function isla()
    {
        return $this->belongsTo(Isla::class, 'islaid');
    }

    // Relación con las actualizaciones
    public function updates()
    {
        return $this->belongsTo(Updates::class, 'update');
    }
}