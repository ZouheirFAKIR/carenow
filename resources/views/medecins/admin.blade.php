@extends('layouts.site')

@section('title', 'Administration')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-16">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-black text-gray-900">Gestion des médecins</h1>
        <a href="{{ route('medecins.create') }}" class="inline-flex items-center gap-2 bg-[#22577A] text-white px-5 py-2.5 rounded-xl font-semibold text-sm hover:bg-[#1b4560] transition">
            <i data-lucide="plus" class="w-4 h-4"></i> Ajouter un médecin
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @forelse($medecins as $medecin)
        <div class="flex items-center justify-between p-5 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex-shrink-0">
                    @if($medecin->photo)
                    <img src="{{ Str::startsWith($medecin->photo, 'medecins/') ? asset('storage/' . $medecin->photo) : asset('images/medecins/' . $medecin->photo) }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-[#22577A] font-bold">
                        {{ substr($medecin->nom, 0, 1) }}
                    </div>
                    @endif
                </div>
                <div>
                    <p class="font-bold text-gray-900">{{ $medecin->nom }}</p>
                    <p class="text-sm text-[#38A3A5]">{{ $medecin->specialite }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('medecins.edit', $medecin) }}" class="p-2 text-gray-500 hover:text-[#22577A] hover:bg-gray-50 rounded-lg transition">
                    <i data-lucide="pencil" class="w-4 h-4"></i>
                </a>
                <form action="{{ route('medecins.destroy', $medecin) }}" method="POST" onsubmit="return confirm('Supprimer ce médecin ?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-2 text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="text-gray-400 text-center py-10">Aucun médecin.</p>
        @endforelse
    </div>
</div>
@endsection