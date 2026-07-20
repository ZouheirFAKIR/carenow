@extends('layouts.site')

@section('title', 'Mes rendez-vous')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-black text-gray-900 mb-8">Mes rendez-vous</h1>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($rendezVous->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">
            <p class="text-gray-400 mb-4">Vous n'avez aucun rendez-vous pour le moment.</p>
            <a href="{{ route('medecins.index') }}" class="inline-flex items-center gap-2 bg-[#22577A] text-white px-5 py-2.5 rounded-xl font-semibold text-sm hover:bg-[#1b4560] transition">
                Prendre un rendez-vous
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($rendezVous as $rdv)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex-shrink-0">
                            @if($rdv->medecin->photo)
                                <img src="{{ asset('images/medecins/' . $rdv->medecin->photo) }}" alt="{{ $rdv->medecin->nom }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#22577A] font-bold">{{ substr($rdv->medecin->nom, 0, 1) }}</div>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">{{ $rdv->medecin->nom }}</h3>
                            <p class="text-sm text-[#38A3A5]">{{ $rdv->medecin->specialite }}</p>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ \Carbon\Carbon::parse($rdv->date_rdv)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($rdv->heure_rdv)->format('H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span @class([
                            'text-xs font-semibold px-3 py-1.5 rounded-full',
                            'bg-yellow-50 text-yellow-700' => $rdv->statut === 'en_attente',
                            'bg-green-50 text-green-700' => $rdv->statut === 'confirme',
                            'bg-red-50 text-red-700' => $rdv->statut === 'annule',
                        ])>
                            @if($rdv->statut === 'en_attente') En attente
                            @elseif($rdv->statut === 'confirme') Confirmé
                            @else Annulé @endif
                        </span>
                        <form action="{{ route('rendezvous.destroy', $rdv) }}" method="POST" onsubmit="return confirm('Annuler ce rendez-vous ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                <i data-lucide="x" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection