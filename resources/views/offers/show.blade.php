@extends('layouts.app')
<script>
    const offerImages="{{json_encode($Offer->images)}}"

</script>

@viteReactRefresh
@vite('resources/css/app.css')
@vite('resources/js/Offer/Slider/offerImageSlider.jsx')
@section('content')

    <div class="container p-5">
        <div class="row">
            <div class="col-xl-9">
                <div class="col-xl-12  d-flex justify-content-center" style="height: 40%" id="OfferImageSlider">
                    <!-- react slider slider -->

                </div>
                <div class="col-xl-12 d-flex justify-content-between">
                    <span>ID: {{$Offer->id}}</span>
                    <span class="cursor-pointer">Zgłoś</span>
                </div>
                <div class="col-xl-12">
                    <!-- offer details -->
                    <div class="col-xl-12">
                        <hr class="w-100">
                        <h4>Szczegóły:</h4>
                        <div class="row">
                            @foreach($Offer->details as $key=>$details)

                                <div class="col-xl-6">
                                    <span class="opacity-50">{{__("offer.$key")}}</span>
                                    <span class="fw-bold" style="color: blue">{{$details}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-12 my-3 py-3">
                        <hr class="w-100">
                        <h4>Wyposarzenie:</h4>
                        <div class="row">
                            @foreach($Offer->equipment as $details)

                                <div class="col-xl-6">

                                    <span class="fw-bold" style="color: blue">{{$details}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if($Offer->type =="standard")
                        <div class="col-xl-12 my-3 py-3">
                            <h4>Lista napraw dostępna tylko dla ofert premium</h4>
                        </div>
                    @else
                        @if(isset($Offer->repairs))
                            <div class="col-xl-12 my-3 py-3">
                                <h4>Lista napraw:</h4>
                                <div class="row">

                                </div>
                            </div>
                         @endif
                    @endif
                    <div class="col-xl-12 my-3 py-3">
                        <hr class="w-100">
                        <h4>Opis:</h4>
                        <p class="my-2">
                            {{$Offer->description}}
                        </p>
                    </div>
                    <div class="col-xl-12 my-3 py-3">
                        <hr class="w-100">
                        <h4>Lokalizacja:</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d160254.95327799048!2d16.851780713436057!3d51.12720970676055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fe9c2d4b58abf%3A0xb70956aec205e0f5!2zV3JvY8WCYXc!5e0!3m2!1spl!2spl!4v1674074507281!5m2!1spl!2spl" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 px-1">
                <div class="my-2">
                    <h4>{{$Offer->carInfo['manufacturer']}} {{$Offer->carInfo['model']}}</h4>
                    <p>{{$Offer->details['productionYear']}} - {{$Offer->details['mileage']}}Km - {{$Offer->details['engineType']}} - {{$Offer->details['enginePower']}}Hp </p>
                </div>
                <div>
                    @if($Offer->status == "reserved" or $Offer->status == "sold")
                        <span class="h3 fw-bold" style="color: red">
                            ZAREZERWOWANO
                        </span>
                    @else
                        <span class="h3 fw-bold" style="color: red">
                        {{$Offer->price}}
                        </span>
                        <span class="h4" style="color: red">
                        PLN
                        </span>
                    @endif
                </div>
                <div class="my-3 p-3" style="border: 1px solid black; border-radius: 15px">
                    <div>
                        <div class="">
                            <span>Informacje:</span>
                            <h3>{{$User->name}}</h3>
                            <h6>{{$User->accountType}}</h6>
                            <span>Konto aktywne od {{ date('Y', strtotime("")) }}</span>
                        </div>
                        <div class="my-3 d-flex flex-column">
                            <span>Dane kontaktowe:</span>
                            <button class="btn-primary btn my-2" @if($Offer->status == "reserved" or $Offer->status == "sold")disabled @endif>Nr telefonu </button>

                            <button class="btn-danger btn my-2" @if($Offer->status == "reserved" or $Offer->status == "sold")disabled @endif>E-mail</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
