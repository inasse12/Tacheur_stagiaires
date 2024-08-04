<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'expediteur', 'destinataire', 'contact_id', 'vue','message'
    ];

    public function userexpediteur()
    {
        return $this->belongsTo(User::class, 'expediteur');
    }

    public function userdestinataire()
    {
        return $this->belongsTo(User::class, 'destinataire');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
