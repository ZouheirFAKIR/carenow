<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins = Medecin::all();
        return view('medecins.index', compact('medecins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medecins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'specialite' => 'required|string|max:255',
        'photo' => 'nullable|image|max:2048',
        'description' => 'nullable|string',
    ]);

    $data = $request->except('photo');

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('medecins', 'public');
    }

    Medecin::create($data);

    return redirect()->route('admin.dashboard')->with('success', 'Médecin ajouté avec succès !');
}

    /**
     * Display the specified resource.
     */

    public function show(Medecin $medecin)
    {
        $avis = $medecin->avis()->with('user')->latest()->get();
        $moyenne = $avis->avg('note');

        return view('medecins.show', compact('medecin', 'avis', 'moyenne'));
    }

    public function storeAvis(Request $request, Medecin $medecin)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|string|max:500',
        ]);

        $medecin->avis()->create([
            'user_id' => Auth::id(),
            'note' => $request->note,
            'commentaire' => $request->commentaire,
        ]);

        return back()->with('success', 'Merci pour votre avis !');
    }

    public function edit(Medecin $medecin)
    {
        return view('medecins.edit', compact('medecin'));
    }

    public function update(Request $request, Medecin $medecin)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('medecins', 'public');
        }

        $medecin->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Médecin modifié avec succès !');
    }

    public function destroy(Medecin $medecin)
    {
        $medecin->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Médecin supprimé.');
    }

    public function adminDashboard()
    {
        $medecins = Medecin::all();
        return view('medecins.admin', compact('medecins'));
    }
}
