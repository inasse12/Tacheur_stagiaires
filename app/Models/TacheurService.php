<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TacheurService extends Model
{
    use HasFactory;

    protected $fillable = [
        'tarifs', 'Task_Location', 'service_id', 'tacheur_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function tacheur()
    {
        return $this->belongsTo(Tacheur::class);
    }

    public function travails(){
        return $this->hasMany(Travail::class);
    }


}
