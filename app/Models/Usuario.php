<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $table = 'tabela_usuario';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'created_at',
        'updated_at'

    ];
}
