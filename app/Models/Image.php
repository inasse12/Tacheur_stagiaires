<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    // Fillable fields
    protected $fillable = [
        'path',
        'imageable_type',
        'imageable_id',
    ];

    // Image morph relationship
    public function imageable()
    {
        return $this->morphTo();
    }

    public function url(){
        return Storage::url($this->path);
    }
}
