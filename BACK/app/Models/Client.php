<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    const MARITAL_STATUS = [
        1 => 'Solteira',
        2 => 'Casada',
        3 => 'divorciada'
    ];
   protected $fillable = ['name', 'email', 'phone', 'data','path'];

}

