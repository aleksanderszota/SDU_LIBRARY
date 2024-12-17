<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'favorite'];
    protected $table = 'Songs'; // Jeśli tabela ma inną nazwę, zmień tutaj
}