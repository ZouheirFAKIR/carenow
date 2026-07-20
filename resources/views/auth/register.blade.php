<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Créer un compte — CareNow</title>
    <link rel="icon" href="{{ asset('images/LogoPNG.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900" style="font-family: 'Inter', sans-serif;">

    <div class="min-h-screen flex">
        <div class="hidden lg:flex flex-col justify-between w-1/2 bg-gradient-to-br from-[#0f2d40] to-[#1b4560] p-12 relative overflow-hidden">
            <div class="absolute top-20 right-20 w-72 h-72 bg-[#80ED99]/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 bg-[#38A3A5]/10 rounded-full blur-3xl"></div>
            <a href="/" class="relative flex items-center gap-2">
                <img src="{{ asset('images/LogoPNG.png') }}" alt="CareNow" class="h-10 w-auto">
                <span class="text-xl font-bold text-white">CareNow</span>
            </a>
            <div class="relative">
                <h2 class="text-4xl font-black text-white leading-tight mb-4">
                    Rejoignez<br>CareNow
                </h2>
                <p class="text-white/60 text-base max-w-sm">
                    Créez votre compte pour prendre rendez-vous avec nos spécialistes en quelques clics.
                </p>
            </div>
            <p class="relative text-white/40 text-xs">© {{ date('Y') }} CareNow</p>
        </div>

        <div class="flex-1 flex items-center justify-center bg-gray-50 px-6 py-10">
            <div class="w-full max-w-sm">
                <div class="lg:hidden text-center mb-6">
                    <a href="/" class="inline-flex items-center gap-2">
                        <img src="{{ asset('images/LogoPNG.png') }}" alt="CareNow" class="h-10 w-auto">
                    </a>
                </div>

                <h1 class="text-2xl font-black text-gray-900 mb-1">Créer un compte</h1>
                <p class="text-gray-400 text-sm mb-6">Rejoignez CareNow en quelques secondes</p>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Nom complet</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Mot de passe</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-1.5 block">Confirmer le mot de passe</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#38A3A5] focus:ring-2 focus:ring-[#38A3A5]/20 transition bg-gray-50">
                            @error('password_confirmation') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full bg-[#22577A] hover:bg-[#1b4560] text-white py-2.5 rounded-xl font-semibold text-sm transition">
                            Créer mon compte
                        </button>
                    </form>

                    <div class="mt-4 pt-4 border-t border-gray-100 text-center">
                        <p class="text-sm text-gray-500">
                            Déjà un compte ?
                            <a href="{{ route('login') }}" class="text-[#22577A] font-semibold hover:underline">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>