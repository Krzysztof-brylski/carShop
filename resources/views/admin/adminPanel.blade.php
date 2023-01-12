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
        const ManufacturerGateWay="{{url("carInfo/manufacturer")}}";
        const ModelGateWay="{{url("carInfo/model/")}}";
        const VersionGateWay="{{url("carInfo/version/")}}";
        const CreateOfferGateWay="{{route("Offer.store")}}";
        const CarEquipmentGateWay="{{url("carEquipment/")}}";

        const accountConfirmationGateWay="{{url("admin/extendedUserConfirmation")}}";
        const offerConfirmationGateWay="{{url("admin/offerConfirmation")}}";
        const repairsConfirmationGateWay="{{url("admin/repairsConfirmation")}}";
        const reportsConfirmationGateWay="{{url("admin/reportConfirmation")}}";

        const usersListGateWay="{{url("admin/usersList")}}";

        const storeManufacturerGateWay="{{url("/admin/carInfo/storeManufacturer")}}";
        const storeModelGateWay="{{url("/admin/carInfo/storeModel")}}";
        const storeVersionGateWay="{{url("/admin/carInfo/storeVersion")}}";
        const storeCarEquipmentGateWay="{{url("/admin/createCarEquipment")}}"

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
