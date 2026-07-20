<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RendezVousController extends Controller
{
    public function index()
    {
        $rendezVous = RendezVous::where('user_id', Auth::id())
            ->with('medecin')
            ->orderBy('date_rdv', 'desc')
            ->get();

        return view('rendezvous.index', compact('rendezVous'));
    }

    public function create(Medecin $medecin)
    {
        return view('rendezvous.create', compact('medecin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'date_rdv' => 'required|date|after_or_equal:today',
            'heure_rdv' => 'required',
            'notes' => 'nullable|string',
        ]);

        RendezVous::create([
            'user_id' => Auth::id(),
            'medecin_id' => $request->medecin_id,
            'date_rdv' => $request->date_rdv,
            'heure_rdv' => $request->heure_rdv,
            'statut' => 'en_attente',
            'notes' => $request->notes,
        ]);

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous demandé avec succès !');
    }

    public function destroy(RendezVous $rendezVous)
    {
        if ($rendezVous->user_id !== Auth::id()) {
            abort(403);
        }

        $rendezVous->delete();

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous annulé.');
    }
}