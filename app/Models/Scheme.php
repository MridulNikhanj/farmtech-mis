<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'eligibility',
        'benefits',
        'deadline',
        'category',
        'state',
        'apply_link',
        'documents',
        'is_trending',
    ];
} 