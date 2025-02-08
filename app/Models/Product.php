<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Product extends Model
{
    use HasFactory, SoftDeletes; // Enable Soft Deletes

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    protected $dates = ['deleted_at']; // Not required, but good for timestamp casting
}
