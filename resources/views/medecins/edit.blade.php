@extends('layouts.site')

@section('title', 'Modifier le médecin')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-black text-gray-900 mb-8">Modifier le médecin</h1>

    <form action="{{ route('medecins.update', $medecin) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Nom complet</label>
            <input type="text" name="nom" value="{{ old('nom', $medecin->nom) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm" required>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Spécialité</label>
            <input type="text" name="specialite" value="{{ old('specialite', $medecin->specialite) }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm" required>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Photo (laisser vide pour garder l'actuelle)</label>
            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm">
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm">{{ old('description', $medecin->description) }}</textarea>
        </div>

        <button type="submit" class="w-full bg-[#22577A] text-white py-3 rounded-xl font-semibold hover:bg-[#1b4560] transition">
            Enregistrer les modifications
        </button>
    </form>
</div>
@endsection