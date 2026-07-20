@extends('layouts.site')

@section('title', 'Mon profil')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-16 space-y-6">
    <h1 class="text-3xl font-black text-gray-900 mb-8">Mon profil</h1>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        @include('profile.partials.update-password-form')
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-red-100 p-8">
        @include('profile.partials.delete-user-form')
    </div>
</div>
@endsection