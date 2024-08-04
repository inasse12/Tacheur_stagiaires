<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'description'
    ];

    protected $perPage = 20;

    public function images(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tacheurService(){
        return $this->hasMany(TacheurService::class);
    }
}
