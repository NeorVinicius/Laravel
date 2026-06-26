<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioModel extends Model
{
    use HasFactory;
    protected $table = 'login';
    protected $fillable = ['nome', 'email', 'senha'];
}