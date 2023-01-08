<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Admin panel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script>
        const crsfToken="{{csrf_token()}}";
        const logoutGateWay="{{route('logout')}}";
        const ManufacturerGateWay="{{url("carInfo/manufacturer/")}}";
        const ModelGateWay="{{url("carInfo/model/")}}";
        const VersionGateWay="{{url("carInfo/version/")}}";
        const CreateOfferGateWay="{{route("Offer.store")}}";
        const CarEquipmentGateWay="{{url("carEquipment/")}}";

        const accountConfirmationGateWay="{{url("http://127.0.0.1:8000/admin/extendedUserConfirmation")}}";
        const offerConfirmationGateWay="{{url("http://127.0.0.1:8000/admin/offerConfirmation")}}";
        const repairsConfirmationGateWay="{{url("http://127.0.0.1:8000/admin/repairsConfirmation")}}";
        const reportsConfirmationGateWay="{{url("http://127.0.0.1:8000/admin/reportConfirmation")}}";

        const usersListGateWay="{{url("http://127.0.0.1:8000/admin/usersList")}}";

    </script>
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/css/app.css'])
    @vite(['resources/css/adminPanelStyle.css'])
    @vite(['resources/js/adminPanel/adminPanel.jsx'])
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<div id="adminPanel">


</div>
