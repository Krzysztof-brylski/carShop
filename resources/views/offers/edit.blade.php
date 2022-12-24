<form action="{{route("Offer.update",['Offer'=>$Offer->id])}}" enctype="multipart/form-data" method="POST" style="display: flex;flex-direction: column;">
    @csrf
    @method('PUT')
    <div>
        cena:<input type="text " name="price">
    </div>
    <div>
        producent:<input type="text " name="manufacturer">
    </div>
    <div>
        model:<input type="text " name="model">
    </div>
    <div>
        werisa :<input type="text " name="version">
    </div>
    <div>
        opis:<input type="text " name="description">
    </div>
    <div>
        wyposarzenie:<input type="text " name="equipment">
    </div>
    <div>
        lokalizacja:<input type="text " name="localization">
    </div>
    <div>
        zdjęcia<input type="file" name="images[]" multiple>
    </div>
    <input type="submit">
</form>
