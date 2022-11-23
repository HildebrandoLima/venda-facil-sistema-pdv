<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    protected $fillable = [
        'matricula',
        'senha',
        'usuario_id',
        'caixa_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [];

    public function getAuthIdentifierName()
    {
        return $this->getKey();   
    }

    public function getAuthIdentifier()
    {
        return $this->matricula;
    }

    public function getAuthPassword()
    {
        return $this->senha;   
    }

    public function getRememberToken()
    {}

    public function setRememberToken($value)
    {}

    public function getRememberTokenName()
    {}
}
