@extends('layouts.site')

@section('title', $medecin->nom . ' — Profil Médical')

@section('content')

{{-- EN-TÊTE DU PROFIL DE DOCTEUR --}}
<section class="relative bg-gradient-to-b from-[#0f2d40] to-[#1b4560] py-16 text-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center gap-8">
        {{-- Photo de Profil --}}
        <div class="w-36 h-36 md:w-44 md:h-44 rounded-3xl overflow-hidden bg-white/10 border-4 border-white/20 shadow-2xl flex-shrink-0">
            @if($medecin->photo)
                <img src="{{ Str::startsWith($medecin->photo, 'medecins/') ? asset('storage/' . $medecin->photo) : asset('images/medecins/' . $medecin->photo) }}" 
                     alt="{{ $medecin->nom }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-white font-black text-5xl bg-[#22577A]">
                    {{ substr($medecin->nom, 0, 1) }}
                </div>
            @endif
        </div>

        {{-- Détails Médecin --}}
        <div class="text-center md:text-left space-y-3">
            <span class="inline-block bg-[#80ED99] text-[#0f2d40] text-xs font-black px-3 py-1 rounded-full uppercase tracking-wider">
                {{ $medecin->specialite }}
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-white">{{ $medecin->nom }}</h1>
            <p class="text-white/80 text-sm max-w-lg">Praticien agréé • Consultations sur rendez-vous</p>

            {{-- Note Globale --}}
            <div class="flex items-center justify-center md:justify-start gap-3 pt-2">
                <div class="flex items-center gap-1 bg-white/10 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/10">
                    <i data-lucide="star" class="w-4 h-4 fill-[#80ED99] text-[#80ED99]"></i>
                    <span class="font-black text-sm text-white">
                        {{ $moyenne ? number_format($moyenne, 1) : 'Nouveau' }}
                    </span>
                    <span class="text-xs text-white/60">({{ $avis->count() }} avis)</span>
                </div>
                <span class="text-xs text-emerald-400 font-semibold flex items-center gap-1">
                    <i data-lucide="check-circle" class="w-4 h-4"></i> Profil Vérifié
                </span>
            </div>
        </div>
    </div>
</section>

{{-- CORPS DU PROFIL DU MÉDECIN --}}
<div class="max-w-6xl mx-auto px-6 py-14 grid grid-cols-1 lg:grid-cols-3 gap-10">
    <div class="lg:col-span-2 space-y-10">
        {{-- Section À propos --}}
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-4">
            <h2 class="text-xl font-black text-gray-900 flex items-center gap-2">
                <i data-lucide="user" class="w-5 h-5 text-[#38A3A5]"></i> À propos du médecin
            </h2>
            <p class="text-gray-600 text-sm leading-relaxed">
                {{ $medecin->description ?? 'Aucune biographie disponible pour ce médecin pour le moment.' }}
            </p>
        </div>

        {{-- Section Avis Patients --}}
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-6">
            <h2 class="text-xl font-black text-gray-900 flex items-center gap-2">
                <i data-lucide="message-square" class="w-5 h-5 text-[#38A3A5]"></i> Avis des patients ({{ $avis->count() }})
            </h2>

            @auth
                <form action="{{ route('medecins.avis.store', $medecin) }}" method="POST" class="bg-gray-50 rounded-2xl p-6 border border-gray-200/60 space-y-4">
                    @csrf
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider block">Attribuer une note</label>
                    <div class="flex gap-3">
                        @for($i = 1; $i <= 5; $i++)
                            <label class="cursor-pointer">
                                <input type="radio" name="note" value="{{ $i }}" class="hidden peer" required>
                                <i data-lucide="star" class="w-7 h-7 text-gray-300 peer-checked:text-[#38A3A5] peer-checked:fill-[#80ED99] transition"></i>
                            </label>
                        @endfor
                    </div>
                    <textarea name="commentaire" rows="3" placeholder="Racontez votre expérience lors de votre consultation..." class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:border-[#38A3A5] transition"></textarea>
                    <button type="submit" class="bg-[#22577A] text-white px-6 py-2.5 rounded-xl font-bold text-xs hover:bg-[#1b4560] transition">
                        Publier mon avis
                    </button>
                </form>
            @endauth

            <div class="divide-y divide-gray-100">
                @forelse($avis as $a)
                    <div class="py-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-900 text-sm">{{ $a->user->name }}</p>
                            <div class="flex text-[#38A3A5]">
                                @for($i = 1; $i <= 5; $i++)
                                    <i data-lucide="star" class="w-3.5 h-3.5 {{ $i <= $a->note ? 'fill-[#80ED99] text-[#38A3A5]' : 'text-gray-200' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs italic">"{{ $a->commentaire }}"</p>
                    </div>
                @empty
                    <p class="text-gray-400 text-sm py-4 text-center">Aucun avis disponible. Soyez le premier à donner votre avis !</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Carte d'action Réservation --}}
    <div>
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-lg sticky top-28 space-y-6">
            <div>
                <h3 class="text-lg font-black text-gray-900 mb-1">Prendre Rendez-vous</h3>
                <p class="text-xs text-gray-400">Sélectionnez votre créneau rapidement</p>
            </div>

            <div class="space-y-3 text-xs text-gray-600 border-y border-gray-100 py-4">
                <div class="flex items-center gap-3">
                    <i data-lucide="map-pin" class="w-4 h-4 text-[#38A3A5]"></i>
                    <span>Casablanca, Maroc</span>
                </div>
                <div class="flex items-center gap-3">
                    <i data-lucide="clock" class="w-4 h-4 text-[#38A3A5]"></i>
                    <span>Du Lundi au Samedi (9h - 18h)</span>
                </div>
            </div>

            <a href="{{ route('rendezvous.create', $medecin) }}" class="w-full flex items-center justify-center gap-2 bg-[#38A3A5] hover:bg-[#22577A] text-white font-bold text-sm py-3.5 rounded-2xl shadow-lg transition">
                <i data-lucide="calendar" class="w-4 h-4"></i> Réserver un créneau
            </a>
        </div>
    </div>
</div>

@endsection