<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_projecto',
        'descricao',
        'contratante',
        'localizacao',
        'prazo'
    ];

    public function capitulos()
    {
        return $this->hasMany(Capitulo::class);
    }
}
