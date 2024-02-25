<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $primaryKey = 'idplayer';
    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'idplayer',
        'nombre',
        'idAlianza',
        'estado',
        'server',
    ];

    // Relación con la alianza
    public function alianza()
    {
        return $this->belongsTo(Alianza::class, 'idAlianza');
    }

    // Relación con los puntos
    public function puntos()
    {
        return $this->hasMany(Puntos::class, 'idPlayer');
    }

    // Relación con las ciudades
    public function cities()
    {
        return $this->hasMany(City::class, 'playerid');
    }
}