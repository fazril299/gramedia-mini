@extends('layouts.app')

@section('content')
    {{-- Official Marvel Dual-Tier Navigation --}}
    @include('partials.navbar')

    {{-- Marvel Comics Hero Masthead Banner (570px) --}}
    @include('partials.masthead-carousel')

    {{-- Marvel Unlimited Subscription Plans --}}
    @include('partials.subscription-plans')

    {{-- Featured Books Catalog --}}
    @include('partials.featured-books')

    {{-- Free Digital Books & Comics (PDF) --}}
    @include('partials.free-books')

    {{-- Free Comic PDF Reader Modal --}}
    @include('partials.pdf-modal')
@endsection