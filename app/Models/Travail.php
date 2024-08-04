<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travail extends Model
{   
    use HasFactory;

    protected $fillable = [
        'adresse',
        'detailTache',
        'etat',
        'motifRefus',
        'note',
        'startTravail',
        'finTravail',
        'nbr_houre',
        'user_id',
        'tacheur_service_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tacheur_service()
    {
        return $this->belongsTo(TacheurService::class);
    }
}
