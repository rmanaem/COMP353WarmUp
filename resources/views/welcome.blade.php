@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="home">
                    <img src="{{URL::asset("/images/covid.png")}}" alt="covid virus molecule">
                    <div class="title m-b-md">
                        COMP 353 Project<br />
                        Covid-19 Spread Tracking
                    </div>
                    <div class="links">
                        <a href="https://github.com/afourneaux">Alexander Fourneaux</a>
                        <a href="https://github.com/rmanaem">Arman Jahanpour</a>
                        <a href="https://github.com/ElviraKonovalov">Elvira Konovalov</a>
                        <a href="https://github.com/Dwarf1er">Antoine Poulin</a>
                    </div>
                    <div class="links">
                        <a href="https://github.com/Dwarf1er/COMP353WarmUp/">GitHub Repository</a>
                    </div>
                </div>
            </div>
        </div>
@endsection