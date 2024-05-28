<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_evento',
        'fecha_evento',
        'direccion_evento',
        'horario_evento',
        'nombre_usuario',
        'apellidos_usuario',
        'codigo_qr',
        'instancia_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instancia()
    {
        return $this->belongsTo(Instancia::class);
    }

}
