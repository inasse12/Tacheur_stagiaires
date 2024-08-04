<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'details',
        'date',
        'designation',
        'tacheur_id'
    ];

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tacheur(){
        return $this->belongsTo(Tacheur::class);
    }

}
