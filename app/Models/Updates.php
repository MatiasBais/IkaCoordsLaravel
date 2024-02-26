<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    protected $table = 'updates';
    protected $primaryKey = 'idupdates';
    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'idupdates',
        'numero',
        'fecha',
        'server',
    ];

    public function puntos()
    {
        return $this->hasMany(Puntos::class, 'numero');
    }
}