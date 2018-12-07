<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{

    protected $table = 'funcionarios';

    protected $fillable = ['id', 'name', 'lastname', 'email', 'telefone', 'id_empresa'];

    public function empresa() {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
