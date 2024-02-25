<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Isla extends Model
{
    protected $table = 'islas';

    // Atributos que se pueden asignar masivamente
    protected $primaryKey = 'idisla';
    protected $fillable = [
        'idisla',
        'x',
        'y',
        'good',
        'woodlv',
        'goodlv',
        'wonder',
        'wonderName',
        'wonderlv',
        'server',
    ];

    // Definir relaciones
    public function cities()
    {
        return $this->hasMany(City::class, 'islaid');
    }
}