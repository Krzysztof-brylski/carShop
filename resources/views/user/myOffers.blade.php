@extends('layouts.app')

@section('content')
    @include('helpers/alerts')
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

                        <td class="d-flex">
                            <a href="{{route("Offer.show",['Offer'=>$offer->id])}}" class="btn btn-primary">Zobacz</a>
                            <a href="{{route("Offer.edit",['Offer'=>$offer->id])}}" class="btn btn-warning">Edytuj</a>
                            @if($offer->status == "standard")
                                <a class="btn btn-info">Ulepsz</a>
                            @endif
                            <form action="{{route("Offer.destroy",['Offer'=>$offer->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Usuń</button>
                            </form>

                            <form action="{{route("Offer.sold",['Offer'=>$offer->id])}}" method="post">
                                @csrf
                                @if($offer->status=="sold")
                                    <button class="btn btn-success" >Anuluj-Sprzedanie</button>
                                @else
                                    <button class="btn btn-success" >Sprzedane</button>
                                @endif
                            </form>

                            <form action="{{route("Offer.reserve",['Offer'=>$offer->id])}}" method="post">
                                @csrf
                                @if($offer->status=="reserved")
                                    <button class="btn btn-secondary" @if($offer->status=="sold") disabled @endif>Anuluj-Zarezerowane</button>
                                @else
                                    <button class="btn btn-secondary" @if($offer->status=="sold") disabled @endif>Zarezerowane</button>
                                @endif

                            </form>
                        </td>
                    </tr>

                @endforeach
                <div class="w-100 d-flex justify-content-center">
                    {{$offers->links()}}
                </div>

            </tbody>
        </table>

    </div>

@endsection
