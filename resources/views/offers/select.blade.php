@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center h-100 align-items-center py-5">
    <div class="card mx-4">
        <div class="card-img">
            <div class="card-img p-1" style="width: 325px!important;">
                <img class="card-img-top" src="{{asset("img/protection.png")}}" width="256px" height="256px" alt="Card image cap">
            </div>
        </div>
        <div class="card-header text-center">
            <h2>Standard</h2>
        </div>
        <div class="card-body">
            <p class="card-text">
                <ul>
                    <li>Brak promocji na stronie głównej</li>
                    <li>Standardowe pozycjonowanie</li>
                    <li>Brak weryfikowanej listy napraw</li>
                </ul>
            <h5 class="fw-bold text-center" style="color: red;">60.99PLN na 3 miesięcy</h5>
            </p>
            <div class="d-flex justify-content-center">
                <form action="{{route("establish.payment")}}" method="post">
                    @csrf
                    <input type="number" name="toPay" value="60.99" hidden>
                    <input type="text" name="type" value="offer" hidden>
                    <input type="text" name="originUrl" value="{{url("/create/standard/offer")}}" hidden>
                    <button class="btn btn-primary">Wybieram</button>
                </form>

            </div>
        </div>
    </div>
    <div class="card mx-4">
        <div class="card-img p-1" style="width: 325px!important;">
            <img class="card-img-top" src="{{asset("img/diamond.png")}}" width="256px" height="256px" alt="Card image cap">
        </div>
        <div class="card-header text-center">
            <h2>Premium</h2>
        </div>
        <div class="card-body">
            <p class="card-text a">
                <ul class="dd-offer-select-ul">
                    <li>Promowanie na stronie głownej</li>
                    <li>Promowanie w wynikach wyszukiwania</li>
                    <li>Weryfikowana lista napraw</li>
                </ul>
            <h5 class="fw-bold text-center" style="color: red;">120.99PLN na 3 miesięcy</h5>
            </p>
            <div class="d-flex justify-content-center">
                <form>
                    @csrf
                    <input type="number" name="toPay" value="60.99" hidden>
                    <input type="text" name="type" value="extendedOffer" hidden>
                    <input type="text" name="originUrl" value="{{url("/create/standard/offer")}}" hidden>
                    <button class="btn btn-primary">Wybieram</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
