<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';

    protected $fillable = ['medecin_id', 'user_id', 'note', 'commentaire'];

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}