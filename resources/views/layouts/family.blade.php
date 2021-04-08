<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('ext_css')
    <style>
    .page-header {
        margin-top: 0px;
    }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel-body text-center" style="border: 2px dotted #4a5568">
                        {{ userPhoto(auth()->user(), ['style' => 'width:100%;max-width:300px']) }}
                    </div>
                    <span class="btn btn-block btn-info">Historique des reglements</span>
                    <span class="btn btn-block btn-info">Liste des bureaux</span>
                    <span class="btn btn-block btn-info">Liste des cotisations</span>
                    <span class="btn btn-block btn-info">Historique des cotisations</span>
                    <span class="btn btn-block btn-info">Liste des projets</span>
                    <span class="btn btn-block btn-info">Liste des seances</span>
                    @if(is_system_admin(auth()->user()))
                        <span class="btn btn-block btn-info">Gestion des familles</span>
                    @endif
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
