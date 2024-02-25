<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alianza extends Model
{

    // Nombre de la tabla en la base de datos
    protected $table = 'alianzas';

    protected $primaryKey = 'idalianza';
    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'idalianza',
        'nombre',
        'server',
    ];

    // Relación con los jugadores
    public function players()
    {
        return $this->hasMany(Player::class, 'idAlianza');
    }
}