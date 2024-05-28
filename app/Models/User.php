<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'fecha_nacimiento',
        'contraseña', // Usamos 'password' porque hemos cifrado la contraseña
        'username',
        'comunidad',
        'ciudad',
        'codigo_postal'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'username_verified_at' => 'datetime',
            'contraseña' => 'hashed',
        ];
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'usuario_evento');
    }
}


