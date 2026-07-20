<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $table = 'rendez_vous';

    protected $fillable = ['user_id', 'medecin_id', 'date_rdv', 'heure_rdv', 'statut', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}