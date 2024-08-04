<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'etat',
        'travail_id',
        'tacheur_id'
    ];

    public function travail()
    {
        return $this->belongsTo(Travail::class);
    }

    public function tacheur()
    {
        return $this->belongsTo(Tacheur::class);
    }
}
