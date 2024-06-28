<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'route',
        'controller',
        'method',
        'roles'
    ];

    protected $casts = [
        'roles' => 'array'
    ];
}
