<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    protected $table = 'puntos';

    protected $primaryKey = 'idPlayer';
    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'idPlayer',
        'update',
        'Totales',
        'Constructor',
        'NivelConstruccion',
        'Investigadores',
        'NivelInvestigadores',
        'Generales',
        'Oro',
        'Donacion'
    ];

    // Definir relaciones
    public function player()
    {
        return $this->belongsTo(Player::class, 'idPlayer');
    }
}