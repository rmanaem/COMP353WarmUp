<?php
    use App\Http\Helpers;
    $account = null;
    $hasMessages = false;
    $permissions = Helpers\LoginHelper::GetPermissionsLevel();
    if ($permissions != 0) {
        $account = Helpers\LoginHelper::GetAccount();
        $hasMessages = Helpers\MessageHelper::HasMessages();
    }
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Covid Spread tracking</title>
        <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ URL::asset('/css/main.css') }}" rel="stylesheet" type="text/css" >

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">
                <img src="{{URL::asset("/images/covid.png")}}" width="30" height="30" alt="covid virus molecule">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if ($account == null) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <div class="nav-link">Welcome, <?= $account->FirstName ?> <?= $account->LastName ?></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/recommendations">Recommendations</a>
                    </li>
                    @if($permissions != 0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/data/persons">Persons</a>
                            @if($permissions == 2)
                                <a class="dropdown-item" href="/data/publichealthworkers">Public Health Workers</a>
                            @endif
                            <a class="dropdown-item" href="/data/publichealthcentres">Public Health Centres</a>
                            <a class="dropdown-item" href="/data/regions">Regions</a>
                            <a class="dropdown-item" href="/data/groupzones">Group Zones</a>
                        </div>
                    </li>
                    @endif
                    @if($permissions == 2)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/symptomHistory">Symptom History</a>
                            </div>
                        </li>
                    @endif
                    @if($permissions != 0)
                    <li class="nav-item">
                        <a class="nav-link" href="/messages">Messages
                        <?php if($hasMessages) : ?>
                            <span style="color:red">&#33;</span>
                        <?php endif; ?></a>
                    </li>
                    @endif
                    @if($permissions != 0)
                        <li class="nav-item">
                            <a class="nav-link" href="/symptomTracking">Symptom Tracking</a>
                        </li>
                    @endif
                    @if($permissions == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/pcrEntry">PCR Results Entry</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        <?php $alerts = $alerts ?? [] ?>
        <?php foreach ($alerts as $alert) : ?>
            <div class="alert alert-<?= $alert['type'] ?>"><?= $alert['text'] ?></div>
        <?php endforeach; ?>

        @yield('content')
        
    </body>
</html>