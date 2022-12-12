<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Login extends Model implements Authenticatable
{
    protected $table = 'login';

    protected $fillable = [
        'matricula',
        'password',
        'usuario_id',
        'caixa_id',
        'created_at',
        'updated_at',
    ];

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
        return $this->password;
    }

    public function getRememberToken()
    {}

    public function setRememberToken($value)
    {}

    public function getRememberTokenName()
    {}
}
