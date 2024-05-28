<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instancia extends Model
{
    use HasFactory;

    protected $fillable = ['evento_id', 'fecha', 'nombre_sala', 'horario', 'ciudad', 'calle', 'comunidad'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    
    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
