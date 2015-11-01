<?php

use Illuminate\Database\Seeder;

class carBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carBrandname')->delete();

        $data = [

                [
                    "id"=>1,
                    "flg"=>1,
                    "images"=>"Acura-Logo.jpg",
                    "brandname"=>"Acura",

                ],
                [
                    "id"=>2,
                    "flg"=>1,
                    "images"=>"alfa-romeo-logo.jpg",
                    "brandname"=>"Alfa Romeo",

                ],
                [
                    "id"=>3,
                    "flg"=>1,
                    "images"=>"aston-martin-logo1.jpg",
                    "brandname"=>"Aston Martin",

                ],
                [
                    "id"=>4,
                    "flg"=>1,
                    "images"=>"audi-logo.jpg",
                    "brandname"=>"Audi",

                ],
                [
                    "id"=>5,
                    "flg"=>1,
                    "images"=>"Bentley-Logo.jpg",
                    "brandname"=>"Bentley",

                ],
                [
                    "id"=>6,
                    "flg"=>1,
                    "images"=>"bmw-logo.jpg",
                    "brandname"=>"BMW",

                ],
                [
                    "id"=>7,
                    "flg"=>1,
                    "images"=>"bugatti-logo.jpg",
                    "brandname"=>"Bugatti",

                ],
                [
                    "id"=>8,
                    "flg"=>1,
                    "images"=>"Buick-Logo.jpg",
                    "brandname"=>"Buick",

                ],
                [
                    "id"=>9,
                    "flg"=>1,
                    "images"=>"Cadillac-Logo.jpg",
                    "brandname"=>"Cadillac",

                ],
                [
                    "id"=>10,
                    "flg"=>1,
                    "images"=>"Chevrolet-Logo.jpg",
                    "brandname"=>"Chevrolet",

                ],
                [
                    "id"=>11,
                    "flg"=>1,
                    "images"=>"Chrysler-Logo.jpg",
                    "brandname"=>"Chrysler",

                ],
                [
                    "id"=>12,
                    "flg"=>1,
                    "images"=>"citroen-logo.jpg",
                    "brandname"=>"Citroen",

                ],
                [
                    "id"=>13,
                    "flg"=>1,
                    "images"=>"Dodge-Logo.jpg",
                    "brandname"=>"Dodge",

                ],
                [
                    "id"=>14,
                    "flg"=>1,
                    "images"=>"ferrari-logo.jpg",
                    "brandname"=>"Ferrari",

                ],
                [
                    "id"=>15,
                    "flg"=>1,
                    "images"=>"fiat-logo.jpg",
                    "brandname"=>"Fiat",

                ],
                [
                    "id"=>16,
                    "flg"=>1,
                    "images"=>"ford-logo.jpg",
                    "brandname"=>"Ford",

                ],
                [
                    "id"=>17,
                    "flg"=>1,
                    "images"=>"Geely-Logo1.jpg",
                    "brandname"=>"Geely",

                ],
                [
                    "id"=>18,
                    "flg"=>1,
                    "images"=>"General-Motors-Logo.jpg",
                    "brandname"=>"General Motors",

                ],
                [
                    "id"=>19,
                    "flg"=>1,
                    "images"=>"GMC-Logo.jpg",
                    "brandname"=>"GMC",

                ],
                [
                    "id"=>20,
                    "flg"=>1,
                    "images"=>"honda-logo.jpg",
                    "brandname"=>"Honda",

                ],
                [
                    "id"=>21,
                    "flg"=>1,
                    "images"=>"hyundai-logo.jpg",
                    "brandname"=>"Hyundai",

                ],
                [
                    "id"=>22,
                    "flg"=>1,
                    "images"=>"Infiniti-Logo.jpg",
                    "brandname"=>"Infiniti",

                ],
                [
                    "id"=>23,
                    "flg"=>1,
                    "images"=>"jaguar-cars-logo1.jpg",
                    "brandname"=>"Jaguar",

                ],
                [
                    "id"=>24,
                    "flg"=>1,
                    "images"=>"Jeep-Logo.jpg",
                    "brandname"=>"Jeep",

                ],
                [
                    "id"=>25,
                    "flg"=>1,
                    "images"=>"Kia-Motors-Logo.jpg",
                    "brandname"=>"Kia",

                ],
                [
                    "id"=>26,
                    "flg"=>1,
                    "images"=>"Koenigsegg.jpg",
                    "brandname"=>"Koenigsegg",

                ],
                [
                    "id"=>27,
                    "flg"=>1,
                    "images"=>"lamborghini-logo.jpg",
                    "brandname"=>"Lamborghini",

                ],
                [
                    "id"=>28,
                    "flg"=>1,
                    "images"=>"land-rover-logo1.jpg",
                    "brandname"=>"Land Rover",

                ],
                [
                    "id"=>29,
                    "flg"=>1,
                    "images"=>"lexus-logo.jpg",
                    "brandname"=>"Lexus",

                ],
                [
                    "id"=>30,
                    "flg"=>1,
                    "images"=>"maserati-logo.jpg",
                    "brandname"=>"Maserati",

                ],
                [
                    "id"=>31,
                    "flg"=>1,
                    "images"=>"mazda-logo.jpg",
                    "brandname"=>"Mazda",

                ],
                [
                    "id"=>32,
                    "flg"=>1,
                    "images"=>"mclaren-logo1.jpg",
                    "brandname"=>"McLaren",

                ],
                [
                    "id"=>33,
                    "flg"=>1,
                    "images"=>"Mercedes-Benz-Logo.jpg",
                    "brandname"=>"Mercedes-Benz",

                ],
                [
                    "id"=>34,
                    "flg"=>1,
                    "images"=>"Mini-Car-Logo1.jpg",
                    "brandname"=>"Mini",

                ],
                [
                    "id"=>35,
                    "flg"=>1,
                    "images"=>"Mitsubishi-Motors-Logo.jpg",
                    "brandname"=>"Mitsubishi",

                ],
                [
                    "id"=>36,
                    "flg"=>1,
                    "images"=>"nissan-logo.jpg",
                    "brandname"=>"Nissan",

                ],
                [
                    "id"=>37,
                    "flg"=>1,
                    "images"=>"Pagani.jpg",
                    "brandname"=>"Pagani",

                ],
                [
                    "id"=>38,
                    "flg"=>1,
                    "images"=>"Peugeot-Logo.jpg",
                    "brandname"=>"Peugeot",

                ],
                [
                    "id"=>39,
                    "flg"=>1,
                    "images"=>"porsche-logo.jpg",
                    "brandname"=>"Porsche",

                ],
                [
                    "id"=>40,
                    "flg"=>1,
                    "images"=>"RAM-Logo.jpg",
                    "brandname"=>"Ram",

                ],
                [
                    "id"=>41,
                    "flg"=>1,
                    "images"=>"renault-logo.jpg",
                    "brandname"=>"Renault",

                ],
                [
                    "id"=>42,
                    "flg"=>1,
                    "images"=>"Rolls-Royce-Logo.jpg",
                    "brandname"=>"Rolls Royce",

                ],
                [
                    "id"=>43,
                    "flg"=>1,
                    "images"=>"Saab.jpg",
                    "brandname"=>"Saab",

                ],
                [
                    "id"=>44,
                    "flg"=>1,
                    "images"=>"Subaru-Logo.jpg",
                    "brandname"=>"Subaru",

                ],
                [
                    "id"=>45,
                    "flg"=>1,
                    "images"=>"suzuki-logo.jpg",
                    "brandname"=>"Suzuki",

                ],
                [
                    "id"=>46,
                    "flg"=>1,
                    "images"=>"TATA-Motors.jpg",
                    "brandname"=>"Tata Motors",

                ],
                [
                    "id"=>47,
                    "flg"=>1,
                    "images"=>"Tesla-Motors-Logo.jpg",
                    "brandname"=>"Tesla",

                ],
                [
                    "id"=>48,
                    "flg"=>1,
                    "images"=>"toyota-logo1.jpg",
                    "brandname"=>"Toyota",

                ],
                [
                    "id"=>49,
                    "flg"=>1,
                    "images"=>"Wolksvagen-Logo.jpg",
                    "brandname"=>"Volkswagen",

                ],
                [
                    "id"=>50,
                    "flg"=>1,
                    "images"=>"volvo-logo.jpg",
                    "brandname"=>"Volvo",

                ]

        ];
        DB::table('carBrandname')->insert($data);

    }
}
