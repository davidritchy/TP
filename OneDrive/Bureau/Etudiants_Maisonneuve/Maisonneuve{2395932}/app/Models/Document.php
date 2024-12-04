<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_document',
        'fichier',
        'user_document',
       
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
