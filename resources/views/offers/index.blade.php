@extends('layouts.app')
@section('content')

    <div class="container my-5">
        @foreach($offers as $offer)
            <div>
                <h2>{{$offer['carInfo']['manufacturer']}}</h2>
                <h3>{{$offer['carInfo']['model']}}</h3>
                <h4>{{$offer['carInfo']['version']}}</h4>
            </div>

        @endforeach
    </div>

@endsection
