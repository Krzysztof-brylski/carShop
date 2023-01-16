@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <h3>Moje ogłoszenia</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id ogłoszenia</th>
                    <th>Status ogłoszenia</th>
                    <th>Typ ogłoszenia</th>
                    <th>Dostępne akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td>{{$offer->id}}</td>
                        <td>{{$offer->status}}</td>
                        <td>{{$offer->type}}</td>

                        <td>
                            <a class="btn btn-primary">Zobacz</a>
                            <a class="btn btn-primary">Edytuj</a>
                            @if($offer->status == "standard")
                                <a class="btn btn-primary">Ulepsz</a>
                            @endif
                            <a class="btn btn-primary">Usuń</a>
                            <a class="btn btn-primary">Sprzedane</a>
                            <a class="btn btn-primary">Zarezerowane</a>
                        </td>
                    </tr>

                @endforeach
                {{$offers->links()}}
            </tbody>
        </table>

    </div>

@endsection
