<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompModel extends Model
{
    use HasFactory;
    protected $table = 'componente';
    protected $fillable = ['nome', 'hora_inicio', 'hora_fim'];
}