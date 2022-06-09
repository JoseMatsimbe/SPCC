<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;
    protected $fillable=[
        'nome',
        'projecto_id',
        'codigo',
        'designacao',
        'quantidade',
        'preco_unitario',
        'preco_total'
    ];
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
