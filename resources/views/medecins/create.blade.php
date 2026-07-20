@extends('layouts.site')

@section('title', 'Ajouter un médecin')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-16">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-black text-gray-900">Ajouter un médecin</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-[#22577A] hover:underline flex items-center gap-1">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Retour à la gestion
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medecins.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-5">
        @csrf

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Nom complet</label>
            <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex: Dr. Ahmed Bennani" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50" required>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Spécialité</label>
            <input type="text" name="specialite" value="{{ old('specialite') }}" placeholder="Ex: Cardiologue" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50" required>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Photo de profil</label>
            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Description</label>
            <textarea name="description" rows="4" placeholder="Présentation du médecin, formation, expérience..." class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="w-full bg-[#22577A] hover:bg-[#1b4560] text-white py-3 rounded-xl font-semibold text-sm transition flex items-center justify-center gap-2">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            Enregistrer le médecin
        </button>
    </form>
</div>
@endsection