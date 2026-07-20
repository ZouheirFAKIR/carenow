<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $fillable = ['nom', 'specialite', 'photo', 'description'];

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    
}
