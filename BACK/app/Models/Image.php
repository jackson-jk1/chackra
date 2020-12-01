<?php

namespace App\Models;

use App\Portfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    const IMAGE_STATUS = [
        1 => 'baner',
        2 => 'galery',

    ];
    use HasFactory;
    protected $fillable = [
        'name', 'path'
    ];

}
