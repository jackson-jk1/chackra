<?php

namespace App\Models;


use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','id_image','description'
    ];
    protected $with = ['image'];
    public function image(){
        return $this->belongsTo(Image::class,'id_image');
    }

}
