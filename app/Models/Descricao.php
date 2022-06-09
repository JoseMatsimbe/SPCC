<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descricao extends Model
{
    use HasFactory;
    protected $fillable = [
        'descricao',
        'codigo_item',
        'coeficiente',
        'unidade',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
