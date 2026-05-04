{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Beranda | SI-PPDB Terpadu 2026')

@section('content')
    @include('partials.home.hero')
    @include('partials.home.features')
    @include('partials.home.requirements')
    @include('partials.home.timeline')
    @include('partials.home.schedule')
    @include('partials.home.jalur')
    @include('partials.home.check-status')
    @include('partials.home.cta')
@endsection
