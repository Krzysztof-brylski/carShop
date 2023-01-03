@extends('layouts.app')
@viteReactRefresh
@vite(['resources/css/app.css'])
@vite(['resources/js/Offer/Searching/Searching.jsx'])
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div id="offerSearching" class="col-xl-6 d-flex p-4 justify-center align-items-center">

            </div>
        </div>
    </body>
</html>
@endsection
