@extends('layouts.site')

@section('title', 'Prendre rendez-vous — CareNow')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-16">
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        {{-- En-tête avec les détails du médecin --}}
        <div class="bg-gradient-to-r from-[#0f2d40] to-[#22577A] p-8 text-white flex items-center gap-6">
            <div class="w-20 h-20 rounded-2xl overflow-hidden bg-white/10 border-2 border-white/20 flex-shrink-0 shadow-md">
                @if($medecin->photo)
                    <img src="{{ Str::startsWith($medecin->photo, 'medecins/') ? asset('storage/' . $medecin->photo) : asset('images/medecins/' . $medecin->photo) }}" 
                         alt="{{ $medecin->nom }}" 
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-white font-black text-2xl bg-[#22577A]">
                        {{ substr($medecin->nom, 0, 1) }}
                    </div>
                @endif
            </div>

            <div>
                <span class="text-xs font-bold text-[#80ED99] uppercase tracking-wider">Réservation de consultation</span>
                <h1 class="text-2xl font-black text-white mt-1">{{ $medecin->nom }}</h1>
                <p class="text-xs text-white/70">{{ $medecin->specialite }}</p>
            </div>
        </div>

        {{-- Formulaire de prise de RDV --}}
        <div class="p-8 sm:p-10">
            <form action="{{ route('rendezvous.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="medecin_id" value="{{ $medecin->id }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="text-xs font-bold text-gray-700 uppercase tracking-wider block mb-2">Date du rendez-vous</label>
                        <input type="date" name="date_rdv" value="{{ old('date_rdv') }}" min="{{ date('Y-m-d') }}" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-2xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
                        @error('date_rdv') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-xs font-bold text-gray-700 uppercase tracking-wider block mb-2">Heure du rendez-vous</label>
                        <input type="time" name="heure_rdv" value="{{ old('heure_rdv') }}" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-2xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
                        @error('heure_rdv') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider block mb-2">Motif ou remarques (Optionnel)</label>
                    <textarea name="notes" rows="3" placeholder="Décrivez brièvement le motif de votre consultation..." class="w-full px-4 py-3 border border-gray-200 rounded-2xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="w-full bg-[#38A3A5] hover:bg-[#22577A] text-white py-4 rounded-2xl font-bold text-sm shadow-lg transition flex items-center justify-center gap-2">
                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                    Confirmer mon rendez-vous
                </button>
            </form>
        </div>
    </div>
</div>
@endsection