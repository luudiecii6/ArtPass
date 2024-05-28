<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipo'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'usuario_evento');
    }

    public function instancias()
    {
        return $this->hasMany(Instancia::class);
    }
}
