@extends('layouts.site')

@section('title', 'Mon tableau de bord')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-black text-gray-900 mb-2">Bonjour, {{ Auth::user()->name }} 👋</h1>
    <p class="text-gray-500 mb-10">Voici un aperçu de votre espace CareNow.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="w-12 h-12 bg-[#22577A]/10 rounded-xl flex items-center justify-center text-[#22577A] mb-4">
                <i data-lucide="calendar" class="w-5 h-5"></i>
            </div>
            <p class="text-2xl font-black text-gray-900">{{ $rendezVous->count() ?? 0 }}</p>
            <p class="text-sm text-gray-500">Rendez-vous au total</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="w-12 h-12 bg-[#38A3A5]/10 rounded-xl flex items-center justify-center text-[#38A3A5] mb-4">
                <i data-lucide="clock" class="w-5 h-5"></i>
            </div>
            <p class="text-2xl font-black text-gray-900">{{ $enAttente ?? 0 }}</p>
            <p class="text-sm text-gray-500">En attente de confirmation</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="w-12 h-12 bg-[#80ED99]/20 rounded-xl flex items-center justify-center text-[#22577A] mb-4">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
            </div>
            <p class="text-2xl font-black text-gray-900">{{ $confirmes ?? 0 }}</p>
            <p class="text-sm text-gray-500">Confirmés</p>
        </div>
    </div>

    <div class="flex flex-wrap gap-4">
        <a href="{{ route('rendezvous.index') }}" class="inline-flex items-center gap-2 bg-[#22577A] text-white px-5 py-2.5 rounded-xl font-semibold text-sm hover:bg-[#1b4560] transition">
            <i data-lucide="calendar" class="w-4 h-4"></i> Voir mes rendez-vous
        </a>
        <a href="{{ route('medecins.index') }}" class="inline-flex items-center gap-2 border-2 border-gray-200 text-gray-700 px-5 py-2.5 rounded-xl font-semibold text-sm hover:border-gray-300 transition">
            Prendre un nouveau rendez-vous
        </a>
        <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 border-2 border-gray-200 text-gray-700 px-5 py-2.5 rounded-xl font-semibold text-sm hover:border-gray-300 transition">
            <i data-lucide="settings" class="w-4 h-4"></i> Modifier mon profil
        </a>
    </div>
</div>
@endsection