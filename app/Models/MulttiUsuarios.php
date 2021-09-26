<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MulttiUsuarios extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'multti_usuarios';

    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'email',
        'senha',
        'created_at',
        'updated_at',
    ];
}
