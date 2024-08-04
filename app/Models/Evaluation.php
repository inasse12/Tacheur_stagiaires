<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'note', 'commentaire', 'travail_id'
    ];

    public function travail()
    {
        return $this->belongsTo(Travail::class);
    }
}
