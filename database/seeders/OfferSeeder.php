<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId;



class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //audi a4
        Offer::firstOrCreate(array(
            '_id'=> new ObjectId("63b442af0b45feb5490950cc"),
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>2000,
                "enginePower"=>120,
                "engineType"=>"diesel",
                "transmission"=>"automatyczna",
                "productionYear"=>2000,
                "mileage"=>2000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a4",
                "version"=>"b7",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
                'klimatyzacja',
            ),
            'price'=>25000,
            'description'=>"super poteżny opis",
            'localization'=>"(19,19)",
            'images'=>['OfferImages/a4b7.jpg',"OfferImages/a4b7v2.jpg"],
        ));

        Offer::firstOrCreate(array(
            '_id'=> new ObjectId("63b442af0b45feb5490950cd"),
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>2001,
                "enginePower"=>122,
                "engineType"=>"benzyna",
                "transmission"=>"manualna",
                "productionYear"=>2001,
                "mileage"=>2001,
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a4",
                "version"=>"b8",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
                'klimatyzacja',
                'nawigacja',
                'tempomat',
            ),
            'price'=>40000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/audia4b8.jpg',"OfferImages/audia4b8v2.jpg","OfferImages/audia4b8v3.jpg"],
        ));

        //audi a3
        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>100,
                "engineType"=>"diesel",
                "transmission"=>"automatyczna",
                "productionYear"=>2010,
                "mileage"=>200000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a3",
                "version"=>"8L",
            ),
            'equipment'=>array(
                'radio',
                'ogrzewane szyby',
                'abs',
                'klimatyzacja',
                'tempomat',
            ),
            'price'=>5000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/audia38l.jpg',"OfferImages/audia38lv2.jpg"],
        ));

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1600,
                "enginePower"=>110,
                "engineType"=>"benzyna",
                "transmission"=>"automatyczna",
                "productionYear"=>2011,
                "mileage"=>250000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a3",
                "version"=>"8p",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
                'klimatyzacja',
                'tempomat',
            ),
            'price'=>30000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/audia38p.jpg',"OfferImages/audia38pv2.jpg"],
        ));

        //audi a5

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>2000,
                "enginePower"=>180,
                "engineType"=>"benzyna",
                "transmission"=>"automatyczna",
                "productionYear"=>2015,
                "mileage"=>150000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a5",
                "version"=>"8t",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
                'esp',
                'klimatyzacja',
                'nawigacja',
                'tempomat',
            ),
            'price'=>80000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/audia58t.jpg',"OfferImages/audia58tv2.jpg"],
        ));

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>2500,
                "enginePower"=>250,
                "engineType"=>"benzyna",
                "transmission"=>"automatyczna",
                "productionYear"=>2019,
                "mileage"=>50000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a3",
                "version"=>"f5",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'ogrzewane fotele',
                'ogrzewana kierownica',
                'abs',
                'esp',
                'klimatyzacja',
                'nawigacja',
                'elektryczne fotele',
                'tempomat',
            ),
            'price'=>200000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/audia5f5.jpg',"OfferImages/audia5f5v2.jpg"],
        ));

        //vw passat

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>80,
                "engineType"=>"diesel",
                "transmission"=>"manualna",
                "productionYear"=>2000,
                "mileage"=>500000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"volkswagen",
                "model"=>"passat",
                "version"=>"b5",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'klimatyzacja',
                'abs',
            ),
            'price'=>5000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/vwpassatb5.jpg',"OfferImages/vwpassatb5v2.jpg"],
        ));
        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>250,
                "engineType"=>"diesel",
                "transmission"=>"manualna",
                "productionYear"=>2000,
                "mileage"=>800000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"volkswagen",
                "model"=>"passat",
                "version"=>"b4",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
            ),
            'price'=>1000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/vwpassatb4.jpg',"OfferImages/vwpassatb4v2.jpg"],
        ));

        //vw golf

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>80,
                "engineType"=>"diesel",
                "transmission"=>"manualna",
                "productionYear"=>2000,
                "mileage"=>500000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"volkswagen",
                "model"=>"golf",
                "version"=>"3",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'klimatyzacja',
                'abs',
            ),
            'price'=>5000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/vwgolf3.jpg',"OfferImages/vwgolf3v2.jpg"],
        ));

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>70,
                "engineType"=>"diesel",
                "transmission"=>"manualna",
                "productionYear"=>2000,
                "mileage"=>800000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"volkswagen",
                "model"=>"golf",
                "version"=>"II",
            ),
            'equipment'=>array(
                'radio',
                'abs',
            ),
            'price'=>1000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/vwgolf2.jpg',"OfferImages/vwgolf2v2.jpg"],
        ));

        //mazda 2

        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>80,
                "engineType"=>"diesel",
                "transmission"=>"manualna",
                "productionYear"=>2000,
                "mileage"=>500000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"mazda",
                "model"=>"II",
                "version"=>"III",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
            ),
            'price'=>5000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/mazda22.jpg',"OfferImages/mazda22v2.jpg"],
        ));
        Offer::firstOrCreate(array(
            'status'=>'active',
            'type'=>'extended',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>1900,
                "enginePower"=>70,
                "engineType"=>"diesel",
                "transmission"=>"manualna",
                "productionYear"=>2000,
                "mileage"=>200000,
            ),
            'carInfo'=>array(
                "manufacturer"=>"mazda",
                "model"=>"II",
                "version"=>"III",
            ),
            'equipment'=>array(
                'radio',
                'elektryczne szyby',
                'ogrzewane szyby',
                'abs',
                'esp',
                'klimatyzacja',
                'nawigacja',
                'elektryczne fotele',
                'tempomat'
            ),
            'price'=>30000,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['OfferImages/mazda23.jpg',"OfferImages/mazda23.jpg"],
        ));

    }

}
