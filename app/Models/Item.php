<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'ikariamguru';

    // Specify the primary key type
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Define the fillable fields
    protected $fillable = ['id', 'desc', 'hasta'];
}