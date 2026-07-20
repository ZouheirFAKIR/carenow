@extends('layouts.site')

@section('title', 'Nos Médecins — CareNow')

@section('content')

{{-- HERO INDEX --}}
<section id="medecins-hero" class="relative bg-[#0f2d40] py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('images/medecinsImgs.png') }}" alt="Nos médecins" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#0f2d40] via-[#0f2d40]/80 to-[#0f2d40]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center space-y-4">
        <span class="inline-block bg-white/10 text-[#80ED99] text-xs font-semibold px-4 py-1.5 rounded-full border border-white/15">
            🩺 Plus de 50 spécialistes diplômés
        </span>
        <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight">
            Trouvez le bon <span class="text-[#80ED99]">médecin</span>
        </h1>
        <p class="text-white/70 text-base max-w-xl mx-auto">
            Consultez les profils de nos praticiens qualifiés et réservez votre consultation en toute simplicité.
        </p>
    </div>
</section>

{{-- CATALOGUE DE MÉDECINS --}}
<div class="max-w-7xl mx-auto px-6 py-16">
    @if($medecins->isEmpty())
        <div class="bg-white rounded-3xl p-16 text-center border border-gray-100 max-w-md mx-auto space-y-4">
            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto">
                <i data-lucide="user-x" class="w-8 h-8"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900">Aucun médecin disponible</h3>
            <p class="text-gray-500 text-sm">Aucun praticien n'a été trouvé pour le moment.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($medecins as $medecin)
                @php
                    $moyenne = $medecin->avis()->avg('note');
                    $totalAvis = $medecin->avis()->count();
                @endphp

                <a href="{{ route('medecins.show', $medecin) }}" class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 overflow-hidden transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-between">
                    <div>
                        <div class="h-80 relative overflow-hidden bg-gray-100">
                            @if($medecin->photo)
                                <img src="{{ Str::startsWith($medecin->photo, 'medecins/') ? asset('storage/' . $medecin->photo) : asset('images/medecins/' . $medecin->photo) }}" 
                                     alt="{{ $medecin->nom }}" 
                                     class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#22577A]/10 to-[#38A3A5]/10">
                                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-[#22577A] font-black text-3xl shadow-md">
                                        {{ substr($medecin->nom, 0, 1) }}
                                    </div>
                                </div>
                            @endif

                            {{-- Badge Note --}}
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-md border border-white/40">
                                <i data-lucide="star" class="w-4 h-4 fill-[#80ED99] text-[#38A3A5]"></i>
                                <span class="text-xs font-black text-[#0f2d40]">
                                    {{ $moyenne ? number_format($moyenne, 1) : 'Nouveau' }}
                                </span>
                                @if($totalAvis > 0)
                                    <span class="text-[10px] text-gray-400 font-normal">({{ $totalAvis }})</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-black text-gray-900 group-hover:text-[#22577A] transition">{{ $medecin->nom }}</h3>
                            <p class="text-sm font-semibold text-[#38A3A5]">{{ $medecin->specialite }}</p>
                            <p class="text-xs text-gray-500 line-clamp-3 leading-relaxed">{{ $medecin->description ?? 'Médecin spécialiste diplômé, engagé pour la santé de ses patients.' }}</p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <span class="w-full flex items-center justify-center gap-2 bg-[#22577A] group-hover:bg-[#38A3A5] text-white font-bold text-sm py-3 rounded-2xl transition duration-300 shadow-md">
                            <i data-lucide="calendar" class="w-4 h-4"></i> Prendre rendez-vous
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection