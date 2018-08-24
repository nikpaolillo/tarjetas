<?php

namespace TarjetasProactividad;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'usuario', 'password',
    ];

    protected $guarded = [
        'super_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function PerfilUsuario() {
        return $this->hasMany('TarjetasProactividad\OperadoraPerfilUsuario', 'usuario_id');
    }

    public function isSuperAdmin() {
        if($this->super_admin == 1) {
            return true;
        }

        return false;
    }

    public function checkRole() {
        $user = Auth::user();
        $user->load('PerfilUsuario.perfil', 'PerfilUsuario.operadora');

        return $user;
        /*if($user->PerfilUsuario[0]->perfil->Descripcion == "Admin") {
            return "Admin";
        } else {
            return "Usuario";
        }*/
    }
}
