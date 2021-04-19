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
<footer class="bg-dark text-center text-lg-start page-footer footer">
    <div class="row">
        <div class="col">
            <h6>Created at Concordia University Department of Engineering and Computer Science | COMP 353 Databases - Winter 2021</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            © 2021 Copyright:
            <a class="text-light" href="https://github.com/Dwarf1er/COMP353WarmUp/">Team wdc353_4</a>
        </div>
    </div>
</footer>