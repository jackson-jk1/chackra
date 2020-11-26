<?php

namespace App\Models;

use App\Portfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'path'
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);

    }

}
