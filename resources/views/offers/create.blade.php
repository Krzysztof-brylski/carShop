@extends('layouts.app')
@vite(['resources/css/app.css'])
@section('content')
<script>
    const ManufacturerGateWay="{{url("carInfo/manufacturer/")}}";
    const ModelGateWay="{{url("carInfo/model/")}}";
    const VersionGateWay="{{url("carInfo/version/")}}";
    const CreateOfferGateWay="{{route("Offer.store")}}";
    const CarEquipmentGateWay="{{url("carEquipment/")}}";
</script>
@viteReactRefresh
@vite(['resources/js/Offer/addOffer/addOffer.jsx'])
<div id="addOffer">

</div>
@endsection
