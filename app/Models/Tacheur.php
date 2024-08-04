<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tacheur extends Model
{
    use HasFactory;

    protected $fillable = [
        'online',
        'solde',
        'verifie',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tacheurService(){
        return $this->hasOne(TacheurService::class);
    }

    public function portfolio(){
        return $this->hasOne(Portfolio::class);
    }

}
