@extends('layouts.site')

@section('title', 'CareNow — Votre Santé, Notre Priorité')

@section('content')

{{-- 1. HERO SECTION LUXE --}}
<section id="hero-section" class="hero-fill relative overflow-hidden bg-[#0f2d40] w-full flex items-center">
    <img src="{{ asset('images/HeroImg.png') }}" alt="Consultation médicale" class="absolute inset-0 w-full h-full object-cover object-center opacity-40 scale-105 transform hover:scale-100 transition duration-1000">
    <div class="absolute inset-0 bg-gradient-to-r from-[#0f2d40] via-[#0f2d40]/90 to-transparent"></div>

    <div class="relative z-10 max-w-[1600px] mx-auto px-3 sm:px-6 h-full flex flex-col justify-center py-12 sm:py-20 w-full">
        <div class="max-w-2xl space-y-6 sm:space-y-8">
            <div class="inline-flex items-center gap-2 sm:gap-2.5 bg-white/10 backdrop-blur-md text-[#80ED99] text-[10px] sm:text-xs font-semibold px-3 py-1.5 sm:px-4 sm:py-2 rounded-full border border-white/15 shadow-inner">
                <span class="w-2 h-2 rounded-full bg-[#80ED99] animate-pulse shrink-0"></span>
                <span>Plateforme Médicale de Référence au Maroc</span>
            </div>
            
            <h1 class="text-2xl sm:text-4xl lg:text-6xl font-black text-white leading-tight tracking-tight">
                L'excellence médicale <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-[#80ED99] via-[#38A3A5] to-white bg-clip-text text-transparent">
                    à portée de main.
                </span>
            </h1>
            
            <p class="text-white/80 text-xs sm:text-base lg:text-lg max-w-xl leading-relaxed">
                Prenez rendez-vous en quelques clics auprès des meilleurs spécialistes certifiés et bénéficiez d'un suivi personnalisé d'exception.
            </p>

            <div class="flex flex-wrap items-center gap-3 sm:gap-4 pt-2">
                <a href="{{ route('medecins.index') }}" class="w-full min-[400px]:w-auto justify-center bg-[#38A3A5] hover:bg-[#22577A] text-white px-5 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold shadow-xl shadow-[#38A3A5]/20 hover:shadow-none hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center gap-2.5 sm:gap-3 text-xs sm:text-base">
                    <i data-lucide="calendar" class="w-4 h-4 sm:w-5 sm:h-5 shrink-0"></i>
                    <span>Prendre rendez-vous</span>
                </a>
                <a href="#offres" class="w-full min-[400px]:w-auto text-center bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/20 px-5 sm:px-8 py-3 sm:py-4 rounded-2xl font-semibold hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-xs sm:text-base">
                    Nos offres spéciales
                </a>
            </div>

            <!-- Preuves sociales -->
            <div class="pt-6 sm:pt-8 flex flex-wrap items-center gap-4 sm:gap-6 border-t border-white/10">
                <div class="flex -space-x-3 shrink-0">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-[#0f2d40] bg-[#22577A] flex items-center justify-center text-white text-[10px] sm:text-xs font-bold">A</div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-[#0f2d40] bg-[#38A3A5] flex items-center justify-center text-white text-[10px] sm:text-xs font-bold">S</div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-[#0f2d40] bg-[#80ED99] flex items-center justify-center text-[#0f2d40] text-[10px] sm:text-xs font-bold">M</div>
                </div>
                <div>
                    <div class="flex items-center gap-1 text-[#80ED99]">
                        @for($i=0; $i<5; $i++)
                            <i data-lucide="star" class="w-3.5 h-3.5 sm:w-4 sm:h-4 fill-current"></i>
                        @endfor
                        <span class="text-white font-bold text-xs sm:text-sm ml-1">4.9/5</span>
                    </div>
                    <p class="text-[10px] sm:text-xs text-white/60">Basé sur plus de 2,400 avis vérifiés</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 2. STATS BANNER --}}
<section class="bg-[#0b2231] py-6 sm:py-8 border-y border-white/10 w-full">
    <div class="max-w-[1600px] mx-auto px-3 sm:px-6 grid grid-cols-1 min-[380px]:grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
        <div class="flex items-center gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[#80ED99] shrink-0">
                <i data-lucide="users" class="w-5 h-5 sm:w-6 sm:h-6"></i>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-black text-white tracking-tight">2 400+</p>
                <p class="text-[10px] sm:text-xs text-white/60 font-medium">Patients accompagnés</p>
            </div>
        </div>
        <div class="flex items-center gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[#80ED99] shrink-0">
                <i data-lucide="award" class="w-5 h-5 sm:w-6 sm:h-6"></i>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-black text-white tracking-tight">50+</p>
                <p class="text-[10px] sm:text-xs text-white/60 font-medium">Spécialistes diplômés</p>
            </div>
        </div>
        <div class="flex items-center gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[#80ED99] shrink-0">
                <i data-lucide="shield-check" class="w-5 h-5 sm:w-6 sm:h-6"></i>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-black text-white tracking-tight">100%</p>
                <p class="text-[10px] sm:text-xs text-white/60 font-medium">Profils vérifiés</p>
            </div>
        </div>
        <div class="flex items-center gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[#80ED99] shrink-0">
                <i data-lucide="clock" class="w-5 h-5 sm:w-6 sm:h-6"></i>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-black text-white tracking-tight">&lt; 2 min</p>
                <p class="text-[10px] sm:text-xs text-white/60 font-medium">Temps de réservation</p>
            </div>
        </div>
    </div>
</section>

{{-- 3. OFFRES ET BANNÈRES PROMOTIONNELLES --}}
<section id="offres" class="py-12 sm:py-20 bg-gray-50 w-full">
    <div class="max-w-[1600px] mx-auto px-3 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-2">
            <div>
                <span class="text-[#38A3A5] font-bold text-[10px] sm:text-xs uppercase tracking-widest bg-[#38A3A5]/10 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full">Offres exclusives</span>
                <h2 class="text-2xl sm:text-4xl font-black text-gray-900 mt-2 sm:mt-3">Offres & Programmes de Santé</h2>
            </div>
            <p class="text-gray-500 text-xs sm:text-sm max-w-md mt-1 md:mt-0">Découvrez nos formules privilégiées conçues pour assurer votre bien-être au quotidien.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
            <!-- Poster 1 -->
            <div class="relative bg-gradient-to-br from-[#0f2d40] via-[#22577A] to-[#1b4560] rounded-3xl p-6 sm:p-10 text-white overflow-hidden shadow-xl group border border-white/10 flex flex-col justify-between">
                <div class="absolute -right-16 -top-16 w-64 h-64 bg-[#38A3A5]/20 rounded-full blur-3xl group-hover:bg-[#80ED99]/20 transition duration-700"></div>
                
                <div class="relative z-10 space-y-3 sm:space-y-4">
                    <span class="inline-block bg-[#80ED99] text-[#0f2d40] text-[10px] sm:text-xs font-black px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full shadow-sm">
                        Bilan Annuel Complet
                    </span>
                    <h3 class="text-xl sm:text-3xl font-black leading-tight">Check-Up Préventif Global</h3>
                    <p class="text-white/70 text-xs sm:text-sm leading-relaxed max-w-md">
                        Comprend une consultation générale, un bilan sanguin complet et un dépistage d'orientation avec nos cardiologues partenaires.
                    </p>
                </div>

                <div class="relative z-10 pt-6 sm:pt-8 flex flex-wrap items-center justify-between gap-4 border-t border-white/10 mt-6">
                    <div>
                        <span class="text-[10px] sm:text-xs text-white/50 block">À partir de</span>
                        <span class="text-xl sm:text-2xl font-black text-[#80ED99]">Sur mesure</span>
                    </div>
                    <a href="{{ route('medecins.index') }}" class="w-full min-[400px]:w-auto justify-center bg-white hover:bg-[#80ED99] text-[#0f2d40] font-bold text-xs sm:text-sm px-5 py-2.5 sm:px-6 sm:py-3 rounded-xl transition-all duration-300 flex items-center gap-2">
                        <span>Réserver mon bilan</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 shrink-0"></i>
                    </a>
                </div>
            </div>

            <!-- Poster 2 -->
            <div class="relative bg-gradient-to-br from-[#1b4560] via-[#38A3A5] to-[#22577A] rounded-3xl p-6 sm:p-10 text-white overflow-hidden shadow-xl group border border-white/10 flex flex-col justify-between">
                <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-[#80ED99]/20 rounded-full blur-3xl group-hover:bg-[#38A3A5]/30 transition duration-700"></div>
                
                <div class="relative z-10 space-y-3 sm:space-y-4">
                    <span class="inline-block bg-white text-[#22577A] text-[10px] sm:text-xs font-black px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full shadow-sm">
                        Soins Dentaires & Esthétiques
                    </span>
                    <h3 class="text-xl sm:text-3xl font-black leading-tight">Sourire & Santé Dentaire</h3>
                    <p class="text-white/80 text-xs sm:text-sm leading-relaxed max-w-md">
                        Profitez d'un détartrage complet combiné à un bilan bucco-dentaire personnalisé par nos chirurgiens-dentistes.
                    </p>
                </div>

                <div class="relative z-10 pt-6 sm:pt-8 flex flex-wrap items-center justify-between gap-4 border-t border-white/10 mt-6">
                    <div>
                        <span class="text-[10px] sm:text-xs text-white/60 block">Consultation rapide</span>
                        <span class="text-lg sm:text-2xl font-black text-white">Disponibilité immédiate</span>
                    </div>
                    <a href="{{ route('medecins.index') }}" class="w-full min-[400px]:w-auto justify-center bg-[#0f2d40] hover:bg-white hover:text-[#0f2d40] text-white font-bold text-xs sm:text-sm px-5 py-2.5 sm:px-6 sm:py-3 rounded-xl transition-all duration-300 flex items-center gap-2">
                        <span>Prendre rendez-vous</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 shrink-0"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4. SECTION DES CONSEILS DES MÉDECINS --}}
<section class="py-12 sm:py-20 bg-white border-y border-gray-100 w-full">
    <div class="max-w-[1600px] mx-auto px-3 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-16">
            <span class="text-[#38A3A5] font-bold text-[10px] sm:text-xs uppercase tracking-widest bg-[#38A3A5]/10 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full">Paroles d'experts</span>
            <h2 class="text-2xl sm:text-4xl font-black text-gray-900 mt-2 sm:mt-3">Conseils de nos Médecins</h2>
            <p class="text-gray-500 text-xs sm:text-sm mt-2 sm:mt-3">Nos spécialistes partagent leurs recommandations pour votre santé au quotidien.</p>
        </div>

        @php
            $conseilsMedecins = \App\Models\Medecin::take(3)->get();
            
            $conseilsTextes = [
                [
                    'titre' => 'Prévention Cardiaque',
                    'icone' => 'heart-pulse',
                    'couleur_bg' => 'bg-[#22577A]/10',
                    'couleur_texte' => 'text-[#22577A]',
                    'texte' => '"Prendre 30 minutes de marche par jour réduit considérablement les risques cardiovasculaires. N\'attendez pas les symptômes pour consulter !"'
                ],
                [
                    'titre' => 'Hydratation & Peau',
                    'icone' => 'sparkles',
                    'couleur_bg' => 'bg-[#38A3A5]/10',
                    'couleur_texte' => 'text-[#38A3A5]',
                    'texte' => '"Une bonne santé dermatologique commence par une hydratation régulière et une protection solaire quotidienne, même en hiver."'
                ],
                [
                    'titre' => 'Hygiène Bucco-Dentaire',
                    'icone' => 'smile',
                    'couleur_bg' => 'bg-[#80ED99]/30',
                    'couleur_texte' => 'text-[#0f2d40]',
                    'texte' => '"Un contrôle dentaire deux fois par an permet d\'éviter 90% des complications. La prévention est la clé d\'un sourire durable."'
                ]
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            @foreach($conseilsTextes as $index => $conseil)
                @php
                    $doc = $conseilsMedecins->get($index);
                @endphp
                <div class="bg-gray-50 rounded-3xl p-6 sm:p-8 border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-3 sm:space-y-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl {{ $conseil['couleur_bg'] }} {{ $conseil['couleur_texte'] }} flex items-center justify-center font-bold shrink-0">
                            <i data-lucide="{{ $conseil['icone'] }}" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-900">{{ $conseil['titre'] }}</h3>
                        <p class="text-gray-600 text-xs sm:text-sm italic leading-relaxed">
                            {{ $conseil['texte'] }}
                        </p>
                    </div>

                    {{-- Doctor Profile Avatar & Details --}}
                    <div class="pt-4 sm:pt-6 border-t border-gray-200/60 mt-4 sm:mt-6 flex items-center gap-3">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full overflow-hidden bg-[#22577A] text-white shrink-0 border-2 border-white shadow-sm">
                            @if($doc && $doc->photo)
                                <img src="{{ Str::startsWith($doc->photo, 'medecins/') ? asset('storage/' . $doc->photo) : asset('images/medecins/' . $doc->photo) }}" 
                                     alt="{{ $doc->nom }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center font-bold text-xs sm:text-sm bg-[#22577A]">
                                    {{ $doc ? substr($doc->nom, 0, 1) : 'Dr' }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <p class="text-xs sm:text-sm font-bold text-gray-900">{{ $doc ? $doc->nom : 'Dr. Spécialiste' }}</p>
                            <p class="text-[10px] sm:text-xs text-[#38A3A5] font-semibold">{{ $doc ? $doc->specialite : 'Médecin Expert' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 5. LISTE DES MÉDECINS VEDETTES --}}
<section class="py-12 sm:py-20 bg-gray-50 w-full">
    <div class="max-w-[1600px] mx-auto px-3 sm:px-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 sm:mb-12 gap-3">
            <div>
                <span class="text-[#38A3A5] font-bold text-[10px] sm:text-xs uppercase tracking-widest bg-[#38A3A5]/10 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full">Médecins qualifiés</span>
                <h2 class="text-2xl sm:text-4xl font-black text-gray-900 mt-2 sm:mt-3">Nos Praticiens Récents</h2>
            </div>
            <a href="{{ route('medecins.index') }}" class="text-[#22577A] hover:text-[#38A3A5] font-bold text-xs sm:text-sm flex items-center gap-1.5 mt-2 sm:mt-0 group transition">
                <span>Voir tous les praticiens</span>
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition shrink-0"></i>
            </a>
        </div>

        @php
            $apercu = \App\Models\Medecin::withAvg('avis', 'note')
                        ->withCount('avis')
                        ->latest()
                        ->take(3)
                        ->get();

            $avisRecents = \App\Models\Avis::with(['user', 'medecin'])->latest()->take(3)->get();
        @endphp

        @if($apercu->isEmpty())
            <div class="bg-white rounded-3xl p-8 sm:p-12 text-center border border-gray-100">
                <p class="text-gray-400 text-xs sm:text-sm">Aucun médecin disponible pour le moment.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($apercu as $medecin)
                    <a href="{{ route('medecins.show', $medecin) }}" class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 overflow-hidden transition-all duration-500 hover:-translate-y-1.5 flex flex-col">
                        <div class="h-64 sm:h-80 relative overflow-hidden bg-gray-100">
                            @if($medecin->photo)
                                <img src="{{ Str::startsWith($medecin->photo, 'medecins/') ? asset('storage/' . $medecin->photo) : asset('images/medecins/' . $medecin->photo) }}" alt="{{ $medecin->nom }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#22577A]/10 to-[#38A3A5]/10">
                                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-white rounded-full flex items-center justify-center text-[#22577A] font-black text-2xl sm:text-3xl shadow-md">{{ substr($medecin->nom, 0, 1) }}</div>
                                </div>
                            @endif

                            <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-white/90 backdrop-blur-md px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-full flex items-center gap-1 sm:gap-1.5 shadow-md border border-white/40">
                                <i data-lucide="star" class="w-3.5 h-3.5 sm:w-4 sm:h-4 fill-[#80ED99] text-[#38A3A5]"></i>
                                <span class="text-[10px] sm:text-xs font-black text-[#0f2d40]">
                                    {{ $medecin->avis_avg_note ? number_format($medecin->avis_avg_note, 1) : 'Nouveau' }}
                                </span>
                                @if($medecin->avis_count > 0)
                                    <span class="text-[9px] sm:text-[10px] text-gray-400 font-normal">({{ $medecin->avis_count }})</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-5 sm:p-6 flex flex-col flex-1 justify-between space-y-4">
                            <div>
                                <h3 class="text-lg sm:text-xl font-black text-gray-900 group-hover:text-[#22577A] transition">{{ $medecin->nom }}</h3>
                                <p class="text-xs sm:text-sm font-semibold text-[#38A3A5] mt-0.5 sm:mt-1">{{ $medecin->specialite }}</p>
                                <p class="text-[11px] sm:text-xs text-gray-500 mt-2 line-clamp-2 leading-relaxed">{{ $medecin->description ?? 'Médecin spécialiste certifié à votre service.' }}</p>
                            </div>

                            <div class="pt-3 sm:pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-[11px] sm:text-xs font-semibold text-[#22577A] flex items-center gap-1">
                                    <i data-lucide="check-circle" class="w-3.5 h-3.5 text-[#80ED99] shrink-0"></i> Disponible
                                </span>
                                <span class="bg-[#22577A] group-hover:bg-[#38A3A5] text-white p-2 sm:p-2.5 rounded-xl transition duration-300 shrink-0">
                                    <i data-lucide="calendar" class="w-3.5 h-3.5 sm:w-4 sm:h-4"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- 6. TÉMOIGNAGES CLIENTS --}}
@if($avisRecents->isNotEmpty())
<section class="py-12 sm:py-20 bg-white w-full">
    <div class="max-w-[1600px] mx-auto px-3 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-16">
            <span class="text-[#38A3A5] font-bold text-[10px] sm:text-xs uppercase tracking-widest bg-[#38A3A5]/10 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full">Avis patients</span>
            <h2 class="text-2xl sm:text-4xl font-black text-gray-900 mt-2 sm:mt-3">Expériences & Avis</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            @foreach($avisRecents as $avis)
                <div class="bg-gray-50 rounded-3xl p-6 sm:p-8 border border-gray-100 flex flex-col justify-between shadow-sm hover:shadow-md transition space-y-6">
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex text-[#38A3A5] gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i data-lucide="star" class="w-3.5 h-3.5 sm:w-4 sm:h-4 {{ $i <= $avis->note ? 'fill-[#80ED99] text-[#38A3A5]' : 'text-gray-200' }}"></i>
                            @endfor
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm leading-relaxed italic">"{{ $avis->commentaire ?? 'Excellente prise en charge.' }}"</p>
                    </div>

                    <div class="pt-4 sm:pt-6 border-t border-gray-200/60 mt-4 sm:mt-6 flex items-center gap-3">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#22577A] text-white flex items-center justify-center font-bold text-xs sm:text-sm shadow-sm shrink-0">
                            {{ substr($avis->user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-xs sm:text-sm">{{ $avis->user->name }}</p>
                            <p class="text-[10px] sm:text-xs text-gray-400">Pour Dr. {{ $avis->medecin->nom }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 7. CTA BANNER FINAL --}}
<section class="py-12 sm:py-16 bg-[#0f2d40] relative overflow-hidden w-full">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center relative z-10 space-y-4 sm:space-y-6">
        <h2 class="text-2xl sm:text-4xl font-black text-white">Prêt à prendre votre santé en main ?</h2>
        <p class="text-white/70 text-xs sm:text-base max-w-xl mx-auto">Rejoignez des milliers de patients qui font confiance à CareNow pour leurs rendez-vous médicaux.</p>
        <a href="{{ route('medecins.index') }}" class="inline-flex items-center gap-2 sm:gap-3 bg-[#38A3A5] hover:bg-[#80ED99] hover:text-[#0f2d40] text-white font-bold px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 text-xs sm:text-base">
            <span>Prendre un rendez-vous dès maintenant</span>
            <i data-lucide="arrow-right" class="w-4 h-4 sm:w-5 sm:h-5 shrink-0"></i>
        </a>
    </div>
</section>

@endsection