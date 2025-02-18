<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Permitir que os campos abaixo sejam preenchidos em massa
    protected $fillable = [
        'name',
        'email',
        'description',
        'portfolio',
    ];
}
