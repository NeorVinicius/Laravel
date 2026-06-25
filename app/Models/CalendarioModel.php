<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioModel extends Model
{
    use HasFactory;
    protected $table = 'calendario';
    protected $fillable = ['dia', 'mes', 'ano', 'lembrete'];
}